// $(function(){
//     $("#uang").keyup(function(e){
//       $(this).val(format($(this).val()));
//     });
//   });
  var format = function(num){
    var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
    if(str.indexOf(".") > 0) {
      parts = str.split(".");
      str = parts[0];
    }
    str = str.split("").reverse();
    for(var j = 0, len = str.length; j < len; j++) {
      if(str[j] != ",") {
        output.push(str[j]);
        if(i%3 == 0 && j < (len - 1)) {
          output.push(",");
        }
        i++;
      }
    }
    formatted = output.reverse().join("");
    return("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
  };

  //format rupiah iuran anggota
  var rupiahIuran = document.getElementById('uang');
  rupiahIuran.addEventListener('keyup', function(e){
      // tambahkan 'Rp.' pada saat form di ketik
      // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
      rupiahIuran.value = formatRupiahIuran(this.value, 'Rp. ');
  });

  function formatRupiahIuran(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
}
  let rupiah = document.getElementById('jumlah');
  console.log(rupiah);
  if (rupiah != null) {
      rupiah.addEventListener('keyup', function(e){
          // tambahkan 'Rp.' pada saat form di ketik
          // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
          rupiah.value = formatRupiah(this.value, 'Rp. ');
      });
  }
  /* Fungsi formatRupiah */
  function formatRupiah(angka, prefix){
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split   		= number_string.split(','),
      sisa     		= split[0].length % 3,
      rupiah     		= split[0].substr(0, sisa),
      ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
      }

      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
  }
