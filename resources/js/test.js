let obj = {};
let ary = ['nama','alamat',"harga"];

for(let i = 0; i > 5;i++){
for (let key of ary) {
     obj[key] = "test";
}
}

console.log(JSON.stringify(obj));
