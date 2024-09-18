FROM node:18-alpine

RUN apk add --no-cache libc6-compat

COPY . .

RUN npm ci

RUN npm run build

COPY . .

EXPOSE 3000
ENV PORT=3000
ENV NODE_ENV=production
ENV HOSTNAME="0.0.0.0"

CMD ["node", "/.next/standalone/server.js"]
