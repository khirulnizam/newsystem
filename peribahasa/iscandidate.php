<?php

//list of word candidates
$candidate_list=array("abang","abu","ada","adat","adik","air","ajak","akal","akar","alah","alas","alim","aliran","alur","ambil","anak","angin","angkat","anjing","api","arang","asal","asam","atas","ayam","bahasa","baik","bangkai","banyak","bapa","basah","batu","bawa","bawah","bayang","bayar","bekas","belah","belahan","belakang","bendera","bengkak","beradu","berair","beralih","berani","berat","berbalik","berbantal","berbelah","berfikiran","bergendang","berhabis","beri","berita","berkandikan","berkerat","berlapang","berpatah","bersihkan","bertilam","bertongkat","berubah","besar","betul","biang","bidan","bintang","bongkar","bongkok","buah","bual","buang","buat","buaya","bujur","buka","buku","bulan","bulat","bunga","buruk","burung","busuk","busung","buta","cabut","cacing","cahaya","cakap","cakar","campur","cari","cecah","cepat","cerai","cerdik","cerita","cermin","cuci","cucur","cupak","curi","dabik","dagang","daki","dakwat","dalam","dapat","darah","datuk","delima","depan","detak","detik","diam","dibayang","diberi","diburu","dingin","dua","duduk","duit","durian","ekor","elok","emas","embun","fahaman","fajar","fasih","gadai","gadis","gagak","gaji","ganti","garam","gatal","gelap","gelegar","geli","gelora","gendang","genjatan","gerak","gerakan","gigi","gila","golok","gugur","gulung","gunting","gunung","habis","halwa","hampa","hancur","hangat","hangus","harga","hati","hentam","hidung","hidup","hilang","hilir","hina","hinggap","hisap","hitam","hujung","hukum","hutang","ibu","ikat","intan","iri","isi","jadi","jaga","jalan","janji","jarum","jatuh","jejak","jerat","jinak","juling","kacang","kain","kaki","kambing","kampung","kata","kaya","kayu","kecil","kecut","kelas","keliling","kembang","kena","kepala","kera","kerang","keras","kering","keringat","kerja","ketam","ketawa","khabar","kikir","kucing","kuda","kuku","kunci","kurang","kus","kusut","kutu","langit","langkah","lapang","lapik","lapuk","lari","laut","lebai","lembut","lena","lepas","lidah","lintah","luar","lubuk","luka","lupa","lurus","mabuk","mahkota","makan","makhluk","malu","mandi","masin","masuk","mat","mata","mati","melangkahi","memanjat","membabi","membalas","membanting","membawa","membuka","memburu","memerah","menarik","menaruh","mengadu","mengambil","meninggal","meniti","minta","muka","mulut","murah","nafas","naik","nama","nasi","nujum","nyawa","nyiur","omong","orang","otak","pacat","pagar","pak","paku","paling","panas","pandai","panjang","pasang","patah","patung","pecah","pedih","pekak","peluk","pembasuh","pencakar","pencuci","pendekar","pening","perah","perang","perigi","perut","pilih","pindah","pinggang","pintu","pisau","potong","pulang","puntung","putera","puteri","putih","putus","rabun","raja","rangkai","rebus","rendam","retak","rezeki","rindu","ringan","rosak","rusuh","sagu","sahaja","sakit","salah","sampah","sampai","saudara","sawan","seberang","sedar","sejuk","sekangkang","sekapur","selendang","senang","sengkang","senyum","sepak","separuh","seri","setengah","singkat","suara","suntuk","tahan","tahi","tahu","tajam","tajuk","tali","tangan","tangkai","tangkap","tarik","taruh","tawar","tebal","tegar","telah","telinga","telungkup","teman","tenang","terburu","termakan","tidur","tikam","tin","tinggi","titik","tua","tulang","tunjuk","turun","ubat","udang","ular","untung","wang","zaman");

iscandidate($word){
	if (in_array($word, $candidate_list)) {
		return true;
	}
	return false;

}

?>