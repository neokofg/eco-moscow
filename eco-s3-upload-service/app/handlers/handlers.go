package handlers

import (
	"encoding/json"
	"log"
	"mime/multipart"
	"net/http"
	"eco-s3-upload-service/app/utils"
	"sync"
)

func HandleUpload(uploader *utils.S3Uploader) http.HandlerFunc {
	return func(w http.ResponseWriter, r *http.Request) {
		err := r.ParseMultipartForm(2000 << 20)
		if err != nil {
			http.Error(w, "Failed to parse multipart form", http.StatusBadRequest)
			return
		}

		files := r.MultipartForm.File["files"]
		if len(files) == 0 {
			http.Error(w, "No files uploaded", http.StatusBadRequest)
			return
		}

		var wg sync.WaitGroup
		urlsCh := make(chan string, len(files)) // Буферизированный канал для URL-ов

		for _, handler := range files {
			wg.Add(1)
			go func(handler *multipart.FileHeader) {
				defer wg.Done()

				file, err := handler.Open()
				if err != nil {
					log.Printf("Failed to open file %s: %v", handler.Filename, err)
					return
				}
				defer file.Close()

				url, err := uploader.UploadFile(file, handler)
				if err != nil {
					log.Printf("Failed to upload file %s: %v", handler.Filename, err)
					return
				}
				log.Printf("File uploaded to: %s", url)
				urlsCh <- url
			}(handler)
		}

		// Закрываем канал после завершения всех горутин
		go func() {
			wg.Wait()
			close(urlsCh)
		}()

		// Считываем все URL-ы из канала и собираем их в массив
		var urls []string
		for url := range urlsCh {
			urls = append(urls, url)
		}

		w.Header().Set("Content-Type", "application/json")
		json.NewEncoder(w).Encode(urls)
	}
}
