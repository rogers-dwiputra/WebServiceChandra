# WebServiceChandra
Contoh WebService sederhana pake PHP

DOKUMENTASI API

Untuk Testing API gw saranin pake plugin google chrome namanya "REST CONSOLE" 
[Download REST Console untuk Google Chrome](https://chrome.google.com/webstore/detail/rest-console/cokgbflfommojglbmbpenpphppikmonn?hl=en "Download REST Console untuk Google Chrome")
---
**POST LOKASI**

Untuk nginput ke server

REQUEST METHOD : POST

REQUEST URL : http://localhost/chandra/postlokasi.php


===== Parameter : ======

1. nama_lokasi
2. harga_bawah
3. harga_atas
4. latitude
5. longitude
6. foto (file)
7. id_user
8. status

===== Contoh Request : =====

Request Url: http://localhost/chandra/postlokasi.php

Request Method: POST

```Files: {
    "0": {
        "webkitRelativePath": "",
        "lastModified": 1400110788000,
        "lastModifiedDate": "2014-05-14T23:39:48.000Z",
        "name": "telkom university logo.jpg",
        "type": "image/jpeg",
        "size": 76330
    },
    "length": 1
}
Params: {
    "nama_lokasi": "rogers music studio",
    "harga_bawah": "5000",
    "harga_atas": "10000",
    "latitude": "123456",
    "longitude": "654321",
    "id_user": "100",
    "status": "Sudah"
}```

==== Contoh Response ====

```{"status":"Sudah","nama_lokasi":"rogers music studio","harga_bawah":"5000","harga_atas":"10000","latitude":"123456","longitude":"654321","foto":"http:\/\/localhost\/chandra\/img\/lokasi\/telkom university logo.jpg","id_user":"100"}```


---
**GET LOKASI**

Untuk minta semua data lokasi

REQUEST METHOD : GET

REQUEST URL : http://localhost/chandra/getlokasi.php

==== Parameter ====

- Ngga ada parameter...

==== Contoh Request ====

```Request Url: http://localhost/chandra/getlokasi.php
Request Method: GET
Status Code: 200
Params: {}```

==== Contoh Response ====

```{"status":"true","lokasi":[{"id_lokasi":"2","nama_lokasi":"Karnivor","harga_bawah":"20000","harga_atas":"500000","latitude":"-6.907895","longitude":"107.623991","foto":"http:\/\/localhost\/chandra\/..\/img\/lokasi\/karnivor_bandung.jpg","id_user":"1","status":"Sudah"},{"id_lokasi":"3","nama_lokasi":"Bober Caffe","harga_bawah":"10000","harga_atas":"70000","latitude":"-6.907156","longitude":"107.623359","foto":"http:\/\/localhost\/chandra\/..\/img\/lokasi\/bober_riau.jpg","id_user":"1","status":"Sudah"},{"id_lokasi":"4","nama_lokasi":"Pizza Hut","harga_bawah":"15000","harga_atas":"100000","latitude":"-6.937069","longitude":"107.623179","foto":"http:\/\/localhost\/chandra\/..\/img\/lokasi\/ph_buah_batu.jpg","id_user":"2","status":"Belum"},{"id_lokasi":"5","nama_lokasi":"Hoka Hoka Bento","harga_bawah":"10000","harga_atas":"50000","latitude":"-6.93958","longitude":"107.625718","foto":"http:\/\/localhost\/chandra\/..\/img\/lokasi\/Hoka Hoka Bento_admin.jpg","id_user":"0","status":"Sudah"},{"id_lokasi":"6","nama_lokasi":"rogers music studio","harga_bawah":"5000","harga_atas":"10000","latitude":"123456","longitude":"654321","foto":"http:\/\/localhost\/chandra\/telkom university logo.jpg","id_user":"100","status":"Sudah"}]}```


---
**GET 1 LOKASI SAJA**

Untuk minta 1 data lokasi saja berdasarkan id_lokasi

REQUEST METHOD : GET

REQUEST URL : http://localhost/chandra/getlokasi.php

==== Parameter ====

1. id_lokasi

==== Contoh Request ====

```Request Url: http://localhost/chandra/getlokasi.php
Request Method: GET
Status Code: 200
Params: {
    "id_lokasi": "5"
}```

==== Contoh Response ====

```{"status":"true","lokasi":{"id_lokasi":"5","nama_lokasi":"Hoka Hoka Bento","harga_bawah":"10000","harga_atas":"50000","latitude":"-6.93958","longitude":"107.625718","foto":"http:\/\/localhost\/chandra\/..\/img\/lokasi\/Hoka Hoka Bento_admin.jpg","id_user":"0","status":"Sudah"}}```
