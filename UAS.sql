CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `status_kehadiran` varchar(20) DEFAULT NULL
);
INSERT INTO `absensi` (`id_absensi`, `id_karyawan`, `tanggal`, `jam_masuk`, `jam_keluar`, `status_kehadiran`) VALUES
(1, 1, '2025-05-01', '08:00:00', '17:00:00', 'Hadir'),
(2, 2, '2025-05-01', '08:05:00', '17:00:00', 'Hadir'),
(3, 3, '2025-05-01', '08:00:00', '17:00:00', 'Hadir'),
(4, 4, '2025-05-01', NULL, NULL, 'Izin'),
(5, 5, '2025-05-01', NULL, NULL, 'Cuti'),
(6, 6, '2025-05-01', '08:00:00', '17:00:00', 'Hadir'),
(7, 7, '2025-05-01', '08:00:00', '17:30:00', 'Lembur'),
(8, 8, '2025-05-01', NULL, NULL, 'Alpha'),
(9, 9, '2025-05-01', '08:10:00', '17:10:00', 'Hadir'),
(10, 10, '2025-05-01', '08:00:00', '17:00:00', 'Hadir');
CREATE TABLE `cuti` (
  `id_cuti` int(11) NOT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
);
INSERT INTO `cuti` (`id_cuti`, `id_karyawan`, `tanggal_mulai`, `tanggal_selesai`, `keterangan`, `status`) VALUES
(1, 5, '2025-05-01', '2025-05-03', 'Liburan keluarga', 'Disetujui'),
(2, 1, '2025-05-10', '2025-05-12', 'Kondisi kesehatan', 'Disetujui'),
(3, 9, '2025-05-15', '2025-05-16', 'Urusan pribadi', 'Menunggu'),
(4, 3, '2025-04-28', '2025-04-30', 'Perjalanan luar kota', 'Disetujui'),
(5, 4, '2025-05-20', '2025-05-21', 'Acara keluarga', 'Ditolak'),
(6, 5, '2025-05-04', '2025-05-06', 'Pemulihan sakit', 'Disetujui'),
(7, 8, '2025-05-11', '2025-05-13', 'Liburan pribadi', 'Menunggu'),
(8, 1, '2025-05-25', '2025-05-27', 'Cuti tahunan', 'Disetujui'),
(9, 7, '2025-05-18', '2025-05-19', 'Kegiatan akademik', 'Disetujui'),
(10, 9, '2025-05-08', '2025-05-09', 'Istirahat mental', 'Disetujui');
CREATE TABLE `gaji` (
  `id_gaji` int(11) NOT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `gaji_pokok` decimal(10,2) DEFAULT NULL,
  `lembur` decimal(10,2) DEFAULT NULL,
  `potongan` decimal(10,2) DEFAULT NULL,
  `total_gaji` decimal(10,2) DEFAULT NULL
);
INSERT INTO `gaji` (`id_gaji`, `id_karyawan`, `bulan`, `tahun`, `gaji_pokok`, `lembur`, `potongan`, `total_gaji`) VALUES
(1, 1, 5, 2025, 5000000.00, 300000.00, 100000.00, 5200000.00),
(2, 2, 5, 2025, 7800000.00, 0.00, 200000.00, 7600000.00),
(3, 3, 5, 2025, 5000000.00, 200000.00, 50000.00, 5150000.00),
(4, 4, 5, 2025, 5200000.00, 0.00, 0.00, 5200000.00),
(5, 5, 5, 2025, 5100000.00, 100000.00, 150000.00, 5050000.00),
(6, 6, 5, 2025, 8000000.00, 350000.00, 50000.00, 8300000.00),
(7, 7, 5, 2025, 6500000.00, 0.00, 100000.00, 6400000.00),
(8, 8, 5, 2025, 4900000.00, 0.00, 0.00, 4900000.00),
(9, 9, 5, 2025, 4800000.00, 150000.00, 50000.00, 4900000.00),
(10, 10, 5, 2025, 5000000.00, 0.00, 0.00, 5000000.00);
CREATE TABLE `izin` (
  `id_izin` int(11) NOT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
);
INSERT INTO `izin` (`id_izin`, `id_karyawan`, `tanggal`, `keterangan`, `status`) VALUES
(1, 4, '2025-05-01', 'Mengantar orang tua ke rumah sakit', 'Disetujui'),
(2, 13, '2025-05-02', 'Mengurus administrasi kampus', 'Disetujui'),
(3, 6, '2025-05-03', 'Kerusakan kendaraan', 'Menunggu'),
(4, 3, '2025-05-04', 'Sakit ringan', 'Disetujui'),
(5, 8, '2025-05-05', 'Keperluan keluarga mendesak', 'Disetujui'),
(6, 2, '2025-05-06', 'Rapat luar kantor', 'Ditolak'),
(7, 17, '2025-05-07', 'Perpanjangan dokumen penting', 'Disetujui'),
(8, 15, '2025-05-08', 'Menemani anak ujian', 'Menunggu'),
(9, 12, '2025-05-09', 'Gangguan kesehatan ringan', 'Disetujui'),
(10, 10, '2025-05-10', 'Urgen: pemakaman kerabat', 'Disetujui');
CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `departemen` varchar(50) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL
);
INSERT INTO `karyawan` (`id_karyawan`, `nama`, `jabatan`, `departemen`, `tanggal_masuk`, `gaji_pokok`) VALUES
(1, 'Yeonjun Choi', 'Supervisor', 'Marketing', '2021-01-15', 6400000.00),
(2, 'Soobin Choi', 'Manager', 'HRD', '2020-07-01', 7800000.00),
(3, 'Beomgyu Choi', 'Staff', 'IT', '2019-11-20', 5000000.00),
(4, 'Taehyun Kang', 'Staff', 'Finance', '2022-03-18', 5200000.00),
(5, 'Huening Kai', 'Staff', 'Marketing', '2018-09-10', 5100000.00),
(6, 'Jungwon Yang', 'Manager', 'IT', '2021-06-23', 8000000.00),
(7, 'Heeseung Lee', 'Supervisor', 'Finance', '2020-12-01', 6500000.00),
(8, 'Jake Sim', 'Staff', 'HRD', '2023-01-05', 4900000.00),
(9, 'Jay Park', 'Staff', 'IT', '2019-04-12', 4800000.00),
(10, 'Sunghoon Park', 'Staff', 'Marketing', '2021-08-19', 5000000.00);
CREATE TABLE `lembur` (
  `id_lembur` int(11) NOT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah_jam` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
);
INSERT INTO `lembur` (`id_lembur`, `id_karyawan`, `tanggal`, `jumlah_jam`, `keterangan`, `status`) VALUES
(1, 7, '2025-05-01', 3, 'Penyelesaian laporan bulanan', 'Disetujui'),
(2, 3, '2025-05-01', 2, 'Backup server dan maintenance', 'Disetujui'),
(3, 6, '2025-05-04', 3, 'Update database dan testing', 'Ditolak'),
(4, 9, '2025-05-02', 2, 'Penyusunan strategi pemasaran', 'Disetujui'),
(5, 2, '2025-05-04', 3, 'Perbaikan sistem IT', 'Disetujui');
DELETE FROM lembur;
# Untuk menjaga konsistensi data dan integritas referensial:
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `id_karyawan` (`id_karyawan`);
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`),
  ADD KEY `id_karyawan` (`id_karyawan`);
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `id_karyawan` (`id_karyawan`);
ALTER TABLE `izin`
  ADD PRIMARY KEY (`id_izin`),
  ADD KEY `id_karyawan` (`id_karyawan`);
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);
ALTER TABLE `lembur`
  ADD PRIMARY KEY (`id_lembur`),
  ADD KEY `id_karyawan` (`id_karyawan`);
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`);
ALTER TABLE `cuti`
  ADD CONSTRAINT `cuti_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`);
ALTER TABLE `gaji`
  ADD CONSTRAINT `gaji_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`);
ALTER TABLE `izin`
  ADD CONSTRAINT `izin_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`);
ALTER TABLE `lembur`
  ADD CONSTRAINT `lembur_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`);
COMMIT;
CREATE VIEW laporan_absensi_harian AS
SELECT a.tanggal, k.nama, a.jam_masuk, a.jam_keluar, a.status_kehadiran
FROM absensi a
JOIN karyawan k ON a.id_karyawan = k.id_karyawan;
SELECT * FROM laporan_absensi_harian;
SHOW TABLEs;
# Cek siapa yang lembur dan berapa jam
SELECT k.nama, l.tanggal, l.jumlah_jam 
FROM lembur l 
JOIN karyawan k ON l.id_karyawan = k.id_karyawan 
WHERE l.status = 'Disetujui';
# Karyawan dengan potongan gaji tertinggi
SELECT k.nama, g.potongan 
FROM gaji g 
JOIN karyawan k ON g.id_karyawan = k.id_karyawan 
ORDER BY g.potongan DESC LIMIT 1;
# Trigger sederhana untuk update absensi ketika cuti disetujui
DELIMITER //
CREATE TRIGGER update_absensi_setelah_cuti
AFTER INSERT ON cuti
FOR EACH ROW
BEGIN
  IF NEW.status = 'Disetujui' THEN
    INSERT INTO absensi (id_karyawan, tanggal, status_kehadiran)
    SELECT NEW.id_karyawan, NEW.tanggal_mulai, 'Cuti'
    WHERE NOT EXISTS (
      SELECT 1 FROM absensi WHERE id_karyawan = NEW.id_karyawan AND tanggal = NEW.tanggal_mulai
    );
  END IF;
END;
//
DELIMITER ;
SHOW TRIGGERS;
DESC cuti;
SELECT * FROM absensi;
SELECT * FROM cuti WHERE status = 'Disetujui';
SELECT * FROM karyawan;
SELECT * FROM cuti WHERE status = 'Menunggu';
SELECT * FROM absensi WHERE id_karyawan = '7';
SELECT * FROM absensi WHERE tanggal = '2025-05-01';
SELECT * FROM absensi WHERE status_kehadiran = 'Alpha';
SELECT * FROM gaji;
ALTER TABLE karyawan DROP COLUMN gaji_pokok;
UPDATE absensi SET jam_keluar = '15:00:00'
WHERE id_absensi = 10;
UPDATE gaji SET lembur = '0.00' WHERE id_karyawan = 9;
UPDATE gaji SET potongan = '0.00' WHERE id_karyawan = 10;
UPDATE gaji SET total_gaji = gaji_pokok + lembur - potongan;
UPDATE cuti SET status = 'Menunggu 'WHERE id_cuti = "1, 2, 3, 4, 5, 6, 7, 8, 9, 10" ;
SELECT * FROM karyawan;
UPDATE cuti SET status = 'Menunggu';
DESC karyawan;
UPDATE izin SET status = 'Menunggu';
UPDATE lembur SET status = 'Disetujui' WHERE id_lembur IN (1, 2);
UPDATE lembur SET id_karyawan = 10 WHERE id_lembur = 2;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
SELECT * FROM karyawan;
INSERT INTO  users (id, username, password) VALUES 
(1, 'soobin', 'soobin123');
INSERT INTO  users (id, username, password) VALUES 
(2, 'jake', 'jake123');
DESC karyawan;
SHOW TABLES;
ALTER TABLE absensi DROP FOREIGN KEY absensi_ibfk_1;
ALTER TABLE cuti DROP FOREIGN KEY cuti_ibfk_1;
ALTER TABLE izin DROP FOREIGN KEY izin_ibfk_1;
ALTER TABLE lembur DROP FOREIGN KEY lembur_ibfk_1;
ALTER TABLE gaji DROP FOREIGN KEY gaji_ibfk_1;
ALTER TABLE lembur AUTO_INCREMENT = 6;
ALTER TABLE lembur MODIFY id_lembur INT(6) NOT NULL AUTO_INCREMENT;
SELECT id_karyawan, COUNT(*) 
FROM karyawan 
GROUP BY id_karyawan 
HAVING COUNT(*) > 1;
SELECT MAX(id_cuti) FROM cuti;
ALTER TABLE karyawan MODIFY id_karyawan INT(11) NOT NULL AUTO_INCREMENT;
SELECT * FROM gaji WHERE id_gaji IS NULL OR id_gaji = 0;
DELETE FROM gaji WHERE id_gaji IS NULL OR id_gaji = 0;
ALTER TABLE gaji MODIFY id_gaji INT(11) NOT NULL AUTO_INCREMENT;
SELECT * FROM lembur;
ALTER TABLE absensi ADD CONSTRAINT absensi_ibfk_1 FOREIGN KEY (id_karyawan) REFERENCES karyawan(id_karyawan) ON DELETE CASCADE;
ALTER TABLE cuti ADD CONSTRAINT cuti_ibfk_1 FOREIGN KEY (id_karyawan) REFERENCES karyawan(id_karyawan) ON DELETE CASCADE;
ALTER TABLE izin ADD CONSTRAINT izin_ibfk_1 FOREIGN KEY (id_karyawan) REFERENCES karyawan(id_karyawan) ON DELETE CASCADE;
ALTER TABLE lembur ADD CONSTRAINT lembur_ibfk_1 FOREIGN KEY (id_karyawan) REFERENCES karyawan(id_karyawan) ON DELETE CASCADE;
ALTER TABLE gaji ADD CONSTRAINT gaji_ibfk_1 FOREIGN KEY (id_karyawan) REFERENCES karyawan(id_karyawan) ON DELETE CASCADE;
ALTER TABLE lembur ADD COLUMN action VARCHAR(50) DEFAULT 'Menunggu' AFTER status;
ALTER TABLE lembur AUTO_INCREMENT = 6;
DESC gaji;
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT,
  ADD PRIMARY KEY (`id_gaji`);
SHOW CREATE TABLE absensi;
SHOW COLUMNS FROM absensi LIKE 'status_kehadiran';
SELECT * FROM users;
DELETE FROM izin WHERE id_izin = 0;
ALTER TABLE izin MODIFY COLUMN id_izin INT AUTO_INCREMENT;
UPDATE karyawan SET nama = 'Karina Blu' WHERE id_karyawan = 1;
UPDATE users SET nama = 'Winter' WHERE id_karyawan = 2;
UPDATE karyawan SET nama = 'NingNing' WHERE id_karyawan = 3;
UPDATE karyawan SET nama = 'Bae Suzy' WHERE id_karyawan = 4;
UPDATE karyawan SET nama = 'Go Youn Jung' WHERE id_karyawan = 5;
UPDATE users SET username = 'winter' WHERE username = 'soobin';







 