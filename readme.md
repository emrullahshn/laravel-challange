Docker çalıştırmak için "docker-compose up -d" kullanılması yeterlidir.

"docker-compose exec app vi .env" commandi ile .env de değişiklikler yapılabilir. Veritabanı parametreleri güncellemek gerekli. Örnek aşağıdaki gibidir.

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laraveluser
DB_PASSWORD=your_laravel_db_password

Sırasıyla aşağıdaki commandler çalıştırılmalı
docker-compose exec app php artisan key:generate //Application key üretmek için
docker-compose exec app php artisan config:cache // Config cache temizlemek için

Şimdi .env de girdiğimiz veritabanı parametrelerine göre bir kullanıcı oluşturmamız gerekiyor.

docker-compose exec db bash // Bu command ile db makinasına ssh yaptığımızı düşünebiliriz.
mysql -u root -p // Bu command ile root kullanıcısına login oluyoruz. Password = "your_mysql_root_password"
GRANT ALL ON laravel.* TO 'laraveluser'@'%' IDENTIFIED BY 'your_laravel_db_password';      // Bu query ile yeni bir kullanıcı oluşturuyoruz
FLUSH PRIVILEGES;
EXIT;
exit

Connection Refused hatasında yapılması gerekenler;

- "docker inspect -f '{{.Name}} - {{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' $(docker ps -aq)"
- docker container her up edildiğinde db farklı ip alabilir. Bu command ile ip alınıp .env dosyasında gerekli değişiklik yapılmalıdır.
- Değişiklikten sonra "docker-compose exec app php artisan config:cache" çalıştırılmalıdır.


Routes

"api/login" => Login için kullanılır.

Request;
	- email
	- password

Response;
	- api_token
	- username
	- email
	- id

"api/user" => Login olan user objesini döner.

"api/info" => Application bilgilerini döner.

"api/categories" => Tüm kategorileri döner.
"api/categories/{id}" => Id si verilen kategorinin detaylarını döner.

"api/songs/listen/{id}" => Id si verilen şarkıyı xSendFile tipinde döner. Stream edilebilir.

"api/favorites/add" => Login kullanıcıya favori müzik eklemek için kullanılır.

Request;
	- songId 

Response;
	- success

"api/favorites/remove" => Login kullanıcıdan favori müzik silmek için kullanılır.

Request;
	- songId 

Response;
	- success

"api/favorites/list" => Login kullanıcının favori müziklerini döner
