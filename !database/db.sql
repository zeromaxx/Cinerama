-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 02 Ιαν 2023 στις 20:18:45
-- Έκδοση διακομιστή: 10.4.24-MariaDB
-- Έκδοση PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
--
-- Βάση δεδομένων: `cinerama`
--

CREATE DATABASE cinerama;

DROP TABLE IF EXISTS `users`;
CREATE TABLE users (
    id int not null auto_increment,
    username varchar(255),
    password varchar(255),
    role varchar(255),
    created_at timestamp null DEFAULT null,
    updated_at timestamp null DEFAULT null,
    primary key (Id)
    );

DROP TABLE IF EXISTS `movies`;
CREATE TABLE movies (
    id int not null auto_increment,
    title varchar(255),
    image varchar(255),
    showtime varchar(255),
    seats int,
    created_at timestamp null DEFAULT null,
    updated_at timestamp null DEFAULT null,
    primary key (Id)
    );

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE reservations (
    id int not null auto_increment,
    movie_id int,
    user_id int,
    reserved_seats varchar(255),
    confirm_reservation boolean DEFAULT 0,
    showtime datetime null DEFAULT null,
    created_at timestamp null DEFAULT null,
    updated_at timestamp null DEFAULT null,
    primary key (Id)
    );

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE schedule (
    id int not null,
    schedule varchar(255),
    created_at timestamp null DEFAULT null,
    updated_at timestamp null DEFAULT null,
    primary key (Id)
    );

INSERT INTO `schedule` VALUES (1, 'Δευτέρα εως και Σάββατο απο τις 17:00  εως και τις 12:00', NULL, '2022-04-06 18:21:35');

INSERT INTO `movies` (`id`, `title`, `image`, `showtime`, `seats`, `created_at`, `updated_at`) VALUES
(1, 'Avatar The Way Of The Water', '1672683650.jpg', '2023-01-19 20:23|2023-01-18 20:23', 44, '2023-01-02 16:20:50', '2023-01-02 16:53:45'),
(2, 'The Last Of Us', '1672683729.jpg', '2023-01-25 08:21', 24, '2023-01-02 16:22:09', '2023-01-02 17:16:20'),
(3, 'Thor Love And Thunder', '1672683819.jpg', '2023-01-19 20:26', 48, '2023-01-02 16:23:39', '2023-01-02 17:08:56');


INSERT INTO `reservations` (`id`, `movie_id`, `user_id`, `reserved_seats`, `confirm_reservation`, `showtime`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '46|', 1, '2023-01-18 20:23:00', '2023-01-02 16:48:59', '2023-01-02 16:53:45'),
(2, 1, 2, '1|50|37|27|', 1, '2023-01-18 20:23:00', '2023-01-02 16:50:15', '2023-01-02 16:51:03'),
(3, 3, 1, '23|13|', 1, '2023-01-19 20:26:00', '2023-01-02 17:08:37', '2023-01-02 17:08:56'),
(4, 2, 1, '14|', 1, '2023-01-25 08:21:00', '2023-01-02 17:15:25', '2023-01-02 17:16:21'),
(5, 1, 1, '14|22|', 0, '2023-01-18 20:23:00', '2023-01-02 17:16:08', '2023-01-02 17:16:08');


-- password admin
INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin', '$2y$10$6HcH4P5Kw7iZupPWS5ifkOzSYD84mzNdWn31SIsDffq0NSC7U.0Ve', 'admin', '2023-07-05 12:03:01', '2023-07-05 12:03:01'),
(2, 'zero@yahoo.com', '$2y$10$lGKYKZqQpyaNFplawAa4ju2Wjtx7hCXU8id6/ID3U8J.lYqfkxjOq', 'customer', '2023-01-02 16:49:40', '2023-01-02 16:49:40');

