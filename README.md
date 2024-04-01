Postman Api bağlantısı işlemleri ;

GET Metodu
1- {host}/api/subscriptions/1   -> abonelik listeleme // id :  1 için 

POST Metodu 
2 - abonelik oluşturma 
{host}/api/subscriptions  
{
    "user_id": 1,
    "name": "standart",
    "description" : "test açıklama",
    "price": 50,
    "start_date": "2024-04-01",
    "end_date": "2024-04-30"
}



