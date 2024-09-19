#!/bin/sh

git_output=$(git pull)

if [[ $git_output == *"Already up to date."* ]]; then
  echo "No changes detected. Exiting."
  exit 0
fi

CHANGES=$(git diff --name-only HEAD@{1} HEAD)

declare -A services=(
    ["backend"]="eco-backend"
    ["posts-service"]="eco-posts-service"
    ["comments-service"]="eco-comments-service"
    ["social-service"]="eco-social-service"
    ["events-service"]="eco-events-service"
)

for service in "${!services[@]}"; do
    service_dir="${services[$service]}"
    echo "Processing $service ..."

    if echo "$CHANGES" | grep -q "^$service_dir/"; then
            echo "Changes detected in $service"

            if echo "$CHANGES" | grep -q "^$service_dir/composer.json"; then
                echo "Running composer install for $service ..."
                docker compose exec $service composer install
            fi

            if echo "$CHANGES" | grep -q "^$service_dir/database/migrations"; then
                echo "Running migrations for $service ..."
                docker compose exec $service php artisan migrate --force
            fi

            if echo "$CHANGES" | grep -q "^$service_dir/routes/api.php"; then
                echo "Updating api for $service ..."
                docker compose exec $service php artisan scribe:generate --force
            fi

            echo "Optimizing and caching routes for $service"
            docker compose exec $service php artisan optimize:clear
            docker compose exec $service php artisan route:cache

            echo "Rebuilding and restarting $service container"
            docker compose stop $service
            docker compose up -d --build $service
    else
        echo "No changes detected in $service"
    fi
done

echo "All services updated and restarted."