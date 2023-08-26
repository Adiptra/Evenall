// function, if else statement, return
// function variable(parameter)
// parameter bisa diartikan sebagai nilai yang akan kita masukkan
function friendOrMore(relationship){
    let result

    if (relationship == true){
        result = 'More'
    }else{
        result = 'Just Friend'
    }

    return result
}
console.log(friendOrMore(true))




// object
// "key1": value = untuk print nilai dengan spasi
// untuk print nilai dengan spasi menggunakan ${variable["key"]}
const user = {
    firstName: 'Adiputra',
    "lastName": 'Irawan',
    "liveIN": 'Jakarta'
}
// kita bisa mengubahnya dengan cara 
user.firstName = 'Nur'
user["lastName"] = 'Irawan'
// kita juga dapat menghapus salah satu object dengan syntax delete
delete user["liveIN"] 
// kita bisa print semua 
console.log(user)
// atau kita bisa print salah satu dari object kita, contoh
console.log(user.firstName)



// array
const a = ["Adiputra", 47, 168, true]

// print salah satu dengan memulai angka dari 0 sebagai angka pertama dari array
// console.log(a[1])
// menamhbahkan data dengan command push
a.push("Irawan")
// Sedangkan untuk mengeluarkan data atau elemen terakhir dari array, kita bisa gunakan metode pop().
a.pop()
// Metode shift() digunakan untuk mengeluarkan elemen pertama dari array, sementara unshift() digunakan untuk menambahkan elemen di awal array.
a.shift()
a.unshift("Adi")
// mendelete
delete a[0]
// Namun, perhatikan di sini bahwa keyword delete hanya menghapus data pada index yang ditentukan lalu membiarkan posisi tersebut kosong. Untuk menghapus elemen, gunakan metode splice() seperti ini:
a.splice(1, 1) // Menghapus dari index 2 sebanyak 1 elemen
// print semua
console.log(a)