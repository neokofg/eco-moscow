import grpc
from concurrent import futures
import moder_service_pb2
import moder_service_pb2_grpc
import joblib
import re
import nltk
from nltk.corpus import stopwords
from nltk.tokenize import word_tokenize

nltk.download('punkt', quiet=True)
nltk.download('stopwords', quiet=True)
stop_words = set(stopwords.words('russian'))

def preprocess_text(text):
    if not isinstance(text, str):
        return ""
    text = text.lower()
    text = re.sub(r'[^\w\s]', '', text)
    tokens = word_tokenize(text)
    tokens = [word for word in tokens if word not in stop_words]
    return ' '.join(tokens)

class ModerService(moder_service_pb2_grpc.ModerServiceServicer):
    def __init__(self):
        self.model = joblib.load('moder_text_model.joblib')

    def PredictModer(self, request, context):
        comment = request.text
        preprocessed_comment = preprocess_text(comment)
        toxicity = self.model.predict([preprocessed_comment])[0]
    
        result = True if toxicity < 0.3 else False

        return moder_service_pb2.ModerResponse(isTrue=result)

def serve():
    server = grpc.server(futures.ThreadPoolExecutor(max_workers=10))
    moder_service_pb2_grpc.add_ModerServiceServicer_to_server(ModerService(), server)
    server.add_insecure_port('[::]:50051')
    server.start()
    server.wait_for_termination()

if __name__ == '__main__':
    serve()