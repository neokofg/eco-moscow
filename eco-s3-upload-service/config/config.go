package config

import (
	"log"
	"os"
)

type S3Config struct {
	Region    string
	Bucket    string
	AccessKey string
	SecretKey string
	EndPoint  string
}

type Config struct {
	S3 S3Config
}

func LoadConfig() Config {
	s3Config := S3Config{
		Region:    os.Getenv("AWS_REGION"),
		Bucket:    os.Getenv("AWS_BUCKET"),
		AccessKey: os.Getenv("AWS_ACCESS_KEY"),
		SecretKey: os.Getenv("AWS_SECRET_KEY"),
		EndPoint:  os.Getenv("AWS_ENDPOINT"),
	}

	if s3Config.Region == "" || s3Config.Bucket == "" || s3Config.AccessKey == "" || s3Config.SecretKey == "" {
		log.Fatal("Missing required S3 configuration")
	}

	return Config{S3: s3Config}
}
