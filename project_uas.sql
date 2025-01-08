-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2025 pada 08.45
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_uas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `beasiswa`
--

CREATE TABLE `beasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mitra_id` bigint(20) UNSIGNED NOT NULL,
  `namaBeasiswa` varchar(255) NOT NULL,
  `deskripsiBeasiswa` varchar(255) NOT NULL,
  `linkPendaftaran` varchar(255) NOT NULL,
  `oprecStart` date NOT NULL,
  `oprecEnd` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `beasiswa`
--

INSERT INTO `beasiswa` (`id`, `mitra_id`, `namaBeasiswa`, `deskripsiBeasiswa`, `linkPendaftaran`, `oprecStart`, `oprecEnd`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Beasiswa Genbi', 'Beasiswa ini didanai oleh Bank Indonesia', 'link', '2024-05-16', '2024-07-25', '1718777883_.PNG', '2024-06-18 23:18:03', '2024-06-18 23:18:03'),
(2, 2, 'Beasiswa Cendekia Baznaz', 'Beasiswa ini didanai oleh Badan Amil Zakat Nasional', 'link_pendaftaranBaznaz', '2024-06-01', '2024-07-25', '1718778249_.jpeg', '2024-06-18 23:24:10', '2024-06-18 23:24:10'),
(3, 2, 'Beasiswa Cendekia Baznaz', 'Beasiswa ini didanai oleh Badan Amil Zakat Nasional', 'link_pendaftaranBaznaz', '2024-06-01', '2024-07-25', '1718778251_.jpeg', '2024-06-18 23:24:11', '2024-06-18 23:24:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim_mhs` varchar(255) NOT NULL,
  `image_cv` varchar(255) NOT NULL,
  `image_transkrip` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`id`, `nim_mhs`, `image_cv`, `image_transkrip`, `created_at`, `updated_at`) VALUES
(1, '2210512047', '1718778458_.pdf', '1718778458_.pdf', '2024-06-18 23:27:38', '2024-06-18 23:27:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `ttl` date NOT NULL,
  `level` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `name`, `prodi`, `angkatan`, `ttl`, `level`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('2210512047', 'Abdul Hakim Darasalam', 'S1 Sistem Informasi', 2022, '2004-06-19', 'user', 'abdul@gmail.com', NULL, '$2y$10$QHSH0.yjWHhoIzxqWHzVrOuKV9/h6SFU6akvlPEE0WxKExVtcQ4Zy', NULL, '2024-06-18 23:15:53', '2024-06-18 23:15:53'),
('2210512064', 'Berdian Sitorus', 'S1 Informatika', 2023, '2005-10-20', 'user', '2210512097@mahasiswa.upnvj.ac.id', NULL, '$2y$10$7xuYLdHppKhTdkObKG.49eNn7vvcWZ9KT9gCqUP2923yhn.DSCTjW', NULL, '2024-12-18 10:39:12', '2024-12-18 10:39:12'),
('2210512103', 'Rangga Yudha', 'S1 Informatika', 2023, '2005-06-07', 'user', '2210512103@mahasiswa.upnvj.ac.id', NULL, '$2y$10$l7zo0YwEAHq92pCeOd0V0.vwefbDjwMY9GAJUZUbtOlIHRCWxAkpG', NULL, '2025-01-06 21:00:04', '2025-01-06 21:00:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_06_14_182850_create_mahasiswas_table', 1),
(6, '2024_06_15_062230_create_mitras_table', 1),
(7, '2024_06_15_100059_create_beasiswas_table', 1),
(8, '2024_06_16_152825_create_surat_rekomendasis_table', 1),
(9, '2024_06_17_175221_create_dokumens_table', 1),
(10, '2024_06_18_085421_create_registrasis_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE `mitra` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mitra`
--

INSERT INTO `mitra` (`id`, `name`, `level`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Genbi Indonesia', 'mitra', 'genbi@beasiswa.com', '2024-06-19 06:30:06', '$2y$10$.rKPd/VWJuR5WSMeyKS.NeDePoWT4JbbwuHI5DyovxRZF8RBPHdQa', 'DRqUW4QymB7VPMs3DIdnksTu9nKEQP3KwmmxgmlMZGTUTvgtvUVYo8E3BkpO', '2024-06-18 21:42:14', '2024-06-18 21:42:14'),
(2, 'Beasiswa Baznas', 'mitra', 'baznaz@gmail.com', '2024-06-19 06:27:02', '$2y$10$VRxXPZfCMF6H4ziyto6DhuS1qGUk3/gLZ.cyfbupryU4.V5jQDa6W', 'GDgucJ8iNAVyGorIeLi609AsEPDzwfspaUUh8Wb5PnvvaU6xSltwgEcA15xP', '2024-06-18 21:42:38', '2024-06-18 21:42:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `registrasi`
--

CREATE TABLE `registrasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `beasiswa_id` bigint(20) UNSIGNED NOT NULL,
  `nama_beasiswa` varchar(255) NOT NULL,
  `nim_mhs` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `nama_mhs` varchar(255) DEFAULT NULL,
  `image_cv` varchar(255) DEFAULT NULL,
  `image_transkrip` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `registrasi`
--

INSERT INTO `registrasi` (`id`, `beasiswa_id`, `nama_beasiswa`, `nim_mhs`, `status`, `nama_mhs`, `image_cv`, `image_transkrip`, `created_at`, `updated_at`) VALUES
(1, 1, 'Beasiswa Genbi', '2210512047', 'pending', 'Abdul Hakim Darasalam', '1718778458_.pdf', '1718778458_.pdf', '2024-06-18 23:28:03', '2024-06-18 23:28:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_rekomendasi`
--

CREATE TABLE `surat_rekomendasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim_mhs` varchar(255) NOT NULL,
  `nama_mhs` varchar(255) NOT NULL,
  `is_rekomendasi` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `surat_rekomendasi`
--

INSERT INTO `surat_rekomendasi` (`id`, `nim_mhs`, `nama_mhs`, `is_rekomendasi`, `created_at`, `updated_at`) VALUES
(1, '2210512047', 'Abdul Hakim Darasalam', 1, '2024-06-18 23:19:08', '2024-06-18 23:19:42'),
(2, '2210512103', 'Rangga Yudha', 0, '2025-01-06 21:17:11', '2025-01-06 21:17:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `level`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'AdminFIK', 'admin', 'admin@admin.com', NULL, '$2y$10$uXJHAr5EuSO5L7bvLJCfcOwVKIA3ytm.QEU22QhgJB4R71VknM99O', 'ShO9nWPDxGYelxjzeSY7k8mJzITOegRRWexJ4M58Re0ePq76n20nJPVYJ5bZ', '2024-06-18 21:42:14', '2024-06-18 21:42:14');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beasiswa_mitra_id_foreign` (`mitra_id`);

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokumen_nim_mhs_foreign` (`nim_mhs`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD UNIQUE KEY `mahasiswa_email_unique` (`email`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mitra_email_unique` (`email`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registrasi_beasiswa_id_foreign` (`beasiswa_id`),
  ADD KEY `registrasi_nim_mhs_foreign` (`nim_mhs`);

--
-- Indeks untuk tabel `surat_rekomendasi`
--
ALTER TABLE `surat_rekomendasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surat_rekomendasi_nim_mhs_foreign` (`nim_mhs`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `surat_rekomendasi`
--
ALTER TABLE `surat_rekomendasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD CONSTRAINT `beasiswa_mitra_id_foreign` FOREIGN KEY (`mitra_id`) REFERENCES `mitra` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD CONSTRAINT `dokumen_nim_mhs_foreign` FOREIGN KEY (`nim_mhs`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `registrasi`
--
ALTER TABLE `registrasi`
  ADD CONSTRAINT `registrasi_beasiswa_id_foreign` FOREIGN KEY (`beasiswa_id`) REFERENCES `beasiswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registrasi_nim_mhs_foreign` FOREIGN KEY (`nim_mhs`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `surat_rekomendasi`
--
ALTER TABLE `surat_rekomendasi`
  ADD CONSTRAINT `surat_rekomendasi_nim_mhs_foreign` FOREIGN KEY (`nim_mhs`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
