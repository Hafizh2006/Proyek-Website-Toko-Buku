-- "user" definition

CREATE TABLE "user" (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	password_user TEXT NOT NULL,
	nama_user TEXT NOT NULL,
	alamat_user TEXT NOT NULL,
	no_user INTEGER NOT NULL,
	"role" TEXT NOT NULL,
	foto TEXT,
	email_user TEXT NOT NULL,
);

-- buku definition

CREATE TABLE "buku" (
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	nama TEXT NOT NULL,
	harga INTEGER NOT NULL,
	stok INTEGER NOT NULL,
	penulis TEXT NOT NULL,
	kategori TEXT NOT NULL, 
	foto_buku TEXT,
);

-- keranjang definition

CREATE TABLE "keranjang" (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	id_user INTEGER NOT NULL,
	id_buku INTEGER NOT NULL,
	jumlah INTEGER NOT NULL, harga REAL NOT NULL,
	CONSTRAINT kranjang_user_FK FOREIGN KEY (id_user) REFERENCES "user"(id),
	CONSTRAINT kranjang_produk_FK FOREIGN KEY (id_buku) REFERENCES "buku"(id)
);

-- pesanan definition

CREATE TABLE pesanan (
	id INTEGER NOT NULL,
	id_user INTEGER NOT NULL,
	order_date DATETIME DEFAULT (CURRENT_TIMESTAMP) NOT NULL,
	total REAL NOT NULL,
	status TEXT DEFAULT ('pending'),
	CONSTRAINT id_pesanan PRIMARY KEY (id),
	CONSTRAINT pesanan_user_FK FOREIGN KEY (id_user) REFERENCES "user"(id)
);

-- detail_pesanan definition

CREATE TABLE detail_pesanan (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	id_pesanan INTEGER NOT NULL,
	id_buku INTEGER NOT NULL,
	jumlah INTEGER NOT NULL,
	CONSTRAINT detail_pesanan_pesanan_FK FOREIGN KEY (id_pesanan) REFERENCES pesanan(id),
	CONSTRAINT detail_pesanan_produk_FK FOREIGN KEY (id_buku) REFERENCES buku(id)
);

-- pembayaran definition

CREATE TABLE pembayaran (
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	id_pesanan INTEGER NOT NULL,
	waktu_pembayaran DATETIME DEFAULT (CURRENT_TIMESTAMP),
	yang_dibayar REAL NOT NULL,
	"method" TEXT,
	setatus TEXT,
	CONSTRAINT pembayaran_pesanan_FK FOREIGN KEY (id_pesanan) REFERENCES pesanan(id)
);