package utils

import (
	"bytes"
	"crypto/sha1"
	"encoding/base32"
	"io"
	"mime/multipart"
	"net/http"
	"strings"
	"eco-s3-upload-service/config"
	"time"

	"github.com/aws/aws-sdk-go/aws"
	"github.com/aws/aws-sdk-go/aws/credentials"
	"github.com/aws/aws-sdk-go/aws/session"
	"github.com/aws/aws-sdk-go/service/s3"
	"path/filepath"
)

type S3Uploader struct {
	s3Client *s3.S3
	bucket   string
	endpoint string
}

func NewS3Uploader(config config.S3Config) *S3Uploader {
	sess := session.Must(session.NewSession(&aws.Config{
		Region:      aws.String(config.Region),
		Credentials: credentials.NewStaticCredentials(config.AccessKey, config.SecretKey, ""),
		Endpoint:    aws.String(config.EndPoint), // Указываем кастомный эндпоинт
	}))

	return &S3Uploader{
		s3Client: s3.New(sess),
		bucket:   config.Bucket,
		endpoint: config.EndPoint,
	}
}

func (u *S3Uploader) UploadFile(file multipart.File, handler *multipart.FileHeader) (string, error) {
	buf := bytes.NewBuffer(nil)
	if _, err := io.Copy(buf, file); err != nil {
		return "", err
	}

	ext := filepath.Ext(handler.Filename)

	name := strings.TrimSuffix(handler.Filename, ext)

	// Создаем хеш на основе имени файла и текущего времени
	h := sha1.New()
	h.Write([]byte(name + time.Now().String()))

	// Кодируем хеш в base32 и обрезаем его до удобочитаемого размера
	hashedName := base32.StdEncoding.EncodeToString(h.Sum(nil))[:12]

	fileName := "sweetify/" + hashedName + ext

	_, err := u.s3Client.PutObject(&s3.PutObjectInput{
		Bucket:             aws.String(u.bucket),
		Key:                aws.String(fileName),
		Body:               bytes.NewReader(buf.Bytes()),
		ContentDisposition: aws.String("attachment"),
		ContentType:        aws.String(http.DetectContentType(buf.Bytes())),
	})
	if err != nil {
		return "", err
	}

	url := "https://cdn.sweetify.ru/" + fileName
	return url, nil
}
