package main

import (
	"github.com/joho/godotenv"
	"log"
	"net/http"
	"os"
	"eco-s3-upload-service/app/handlers"
	"eco-s3-upload-service/app/utils"
	"eco-s3-upload-service/config"
)

func main() {
	err := godotenv.Load()
	if err != nil {
		log.Fatalf("Error loading .env file")
	}
	loadConfig := config.LoadConfig()

	uploader := utils.NewS3Uploader(loadConfig.S3)

	http.HandleFunc("/upload", handlers.HandleUpload(uploader))

	port := os.Getenv("PORT")
	if port == "" {
		port = "8080"
	}

	log.Printf("Server started on port %s", port)
	log.Fatal(http.ListenAndServe(":"+port, nil))
}
