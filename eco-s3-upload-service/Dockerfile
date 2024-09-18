FROM golang:1.23.0-alpine

COPY . .

RUN go mod download

RUN go build -o /eco-s3-upload-service cmd/main.go

EXPOSE 8001

ENTRYPOINT ["/eco-s3-upload-service"]