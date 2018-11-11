# Import-massive-excel-sheet
Import massive excel sheet  (Laravel , Queues , jobs, events).

(laravel 5.7 & PHP 7.1)

1:  clone repo.

2: composer install

3: configure your .env as .env.example

4:run php artisan key:generate

5: run php artisan migrate

6:run php artisan queue:work

7:run php artisan serve  i assumed that it ran on "http://127.0.0.1:8000"

8:use api "http://127.0.0.1:8000/api/import-patients"  with post method to import excel file

9: curl --request POST \
  --url http://127.0.0.1:8000/api/import-patients \
  --header 'content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW' \
  --form patientFile=undefined
