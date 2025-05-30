# MVCsimple

Buat yang dilarang pake framework pas disuruh bikin project php.

---
# Routing

Routing sudah auto, namun ada beberapa hal yang harus diperhatikan.  
Routing di sini berbasis **nama file**, jadi ikuti instruksi dari dokumentasi yang saya buat.

URL hanya maksimal:


```
myurl.test/satu/dua/tiga
```
**Penjelasan**  
  
- Pada **satu** merujuk pada nama controller ataupun view.  
Yang diutamakan adalah Controller dan setelah itu adalah view  

- Pada **dua** merujuk pada nama method dari controller  
Jika hanya menyebutkan nama controller maka proses akan ditujukan kepada menthod index
Namun pada view, akan dianggap sebagai parameter

- Pada **tiga** merujuk pada parameter dari method controller, biasanya dipake buat nangkep data dari url (GET)

>[!IMPORTANT]
>Pada file config.php ubah mvcsimple menjadi nama projectmu untuk menghindari error



# View
- Bikin view di folder views dengan format penamaan file viewname.view.php
- Jadi view disini ada 2 macam yaitu view dengan parameter dan tanpa parameter
 ### View Tanpa Parameter
 Jadi view ini ditujukan untuk tampilan static saja, jadi tidak menerima data apapun dari database ataupun api

#### Contoh
```php
<?php
function viewname(){ ?>
    <h1>Hello world</h1>
<?php } ?>
```
#### Akses di browser:
```php
// jika menggunakan localhost
localhost/projectname/viewname

// jika menggunakan laragon/sejenisnya
projectname.test/viewname
```
---
### View Dengan Parameter
Parameter ini berfungsi untuk mengambil data yang dikirim dari controller, jadi tugas view disini untuk menampilkan output yang dikirimkan melalui parameter yang dibuat.
luwh juga dapat mengirim data melalui url perhatikan contoh berikut :

#### Contoh
```php
<?php
function viewname($name)
{ ?>
    <h1>Hello <?= $name ?></h1>
<?php } ?>
```
#### Akses di browser
```php
// jika menggunakan localhost
localhost/projectname/viewname/john

// jika menggunakan laragon/sejenisnya
projectname.test/viewname/john
```
#### Output
```bash
Hello john
```  

---
# Controller
Singkat aja, jadi controller ini buat nyimpen logic dari apa yang KAU lakuin.  

## Cara bikin
```php
<?php

class NamaController {
    public function index() {
        echo "hello world";
    }
}
```
Format penamaan adalah __namaController__  
  
**Contoh**
```php
LoginController
```
>[!WARNING]
>Pastiin jangan typo yh bg




### Cara bikin method
```php
<?php

class NamaController {
    public function methodsaya(){
        echo "hello world";
    }
}
```

**Cara Akses**
```php
localhost/myproject/name/methodsaya

atau

myproject/name/methodsaya
```

**Output**
```
hello world
```
---

### Method dengan parameter
```php
<?php

class NamaController {
    public function methodsaya($data){
        echo "hello $data";
    }
}
```

**Cara Akses**
```php
localhost/myproject/name/methodsaya/bujang

atau

myproject/name/methodsaya/bujang
```

**Output**
```
hello bujang
```


---

# Model  

Model sudah ada templatenya jadi gaperlu bikin query lagi, tapi emang perlu yang custom yaudah bikin sendiri.  
>[!IMPORTANT]
>Jangan Malas


## Menghubungkan controller dengan model  
- panggil file model
- extends class model
- beres

```php
<?php
include_once("models/Model.model.php");
class NamaController extends Model
{
    public function methodsaya()
    {
        echo "method sudah terpanggil";
    }
}
```

## Template query  
Beberapa template query yang udah gwe sediain biar code makin clean dan gampang dipahami.  


#### Get All Data
```php
$this->getAll("namatable");
```

Fungsinya buat ambil semua data dari table, SELECT * FROM table


#### Get By Id
```php
$this->getById("namatable", "field", "id");
```

Fungsinya buat ambil data yang kamu mau, SELECT * FROM table WHERE id


#### Create
```php
$this->create("namatable", ["NULL", "'value'", "'value'", "1"]);
```

Perhatihan tanda pada array, selain string maka simpan dalam ""  
Kalau string maka "'string'" liat baek baek anjir  
>[!IMPORTANT]
>INI BERLAKU CUMA DI CREATE AJA


  
#### Update
```php
$this->update("namatable", "field", "data", "target", "target_value");
```

field sama data itu isinya target field dan data yang mau diubah, nah target tu kek id dia gitu loh wak  
UPDATE table SET field='data' where target='target_value'  

#### Delete
```php
$this->delete("namatable", "target", "target_value);
```

Buat hapus data



# API  

Cara bikinnya gampang, tinggal ke file api.controller.php

```php
<?php
include_once("models/Model.model.php");
class ApiController extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getallproduct()
    {
        createPublicAPI($this->getAll("namatable"));
    }
}
```
**Output**
```php
// cuma contoh ya
[
    {
        "kd_brg": "BRG001",
        "nama_brg": "Tanjay maassabar",
        "harga_brg": "2500000",
        "stok_brg": "10"
    },
    {
        "kd_brg": "BRG002",
        "nama_brg": "Monitor LED 32 Inch",
        "harga_brg": "30000000",
        "stok_brg": "20"
    },
    {
        "kd_brg": "BRG003",
        "nama_brg": "Mouse Wireless Logitech",
        "harga_brg": "175000",
        "stok_brg": "10"
    },
    {
        "kd_brg": "BRG005",
        "nama_brg": "Mouse Wireless Rexus",
        "harga_brg": "1725000",
        "stok_brg": "10"
    }
]
```

>[!TIP]
>Pastikan mengerti Controller dan model, maka anda bisa mengerti ini



# Middleware komingsun, i need sleep bro
# Adios
