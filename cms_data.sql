-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 20 apr 2020 om 13:14
-- Serverversie: 10.1.37-MariaDB
-- PHP-versie: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_data`
--

--
-- Gegevens worden geëxporteerd voor tabel `blog`
--

INSERT INTO `blog` (`blogid`, `url`, `title`, `content`, `active`) VALUES
(1, 'youre-not-that-busy', 'You’re not that busy. Make time for what you love', '<p>We’d be happier if we invested more time in our relationships, passions and health. Yet we don’t make time for it. We’re “too busy”. But is this excuse really valid? Statistics don’t work in our favour - on average, we spend almost 6 hours on social media and watching TV everyday. That’s one quarter of our day, of our lives. </p>\r\n<p>After a busy day at work, we want to unwind. So we choose to do what’s easiest: reach for our phones, stare at our computers. We know it isn’t “ideal”, that we could spend our time in better ways. But. There’s always a “but”. We don’t have time. We’re tired...</p>\r\n<p>But. Let’s change the excuses game. We don’t have time. But we can change our priorities and make room for what we want. We’re tired. But we feel energised after spending some time on our hobbies and friends.</p>\r\n<p>It’s time to give up our excuses. Are you up for a challenge?</p>\r\n<br>\r\n<h2>I DON’T HAVE TIME. BUT I CAN MAKE IT.</h2>\r\n<p><strong>First Challenge: #TrackYourWeek</strong></p>\r\n<p>Making time isn’t about magic. We all have 168 hours a week. We have to find time. Where does our time go? Let’s find out:</p>\r\n<ul>\r\n<li><strong>Get a calendar.</strong> Digital or on paper. Whatever your preference is. Don’t start investigating the apps for hours on end. Set aside 5 minutes. Pick one. Done.</li>\r\n<li><strong>Be specific.</strong> Every time you finish a task, note down what you did and how long it took. It should be quick. </li>\r\n<li><strong>Be honest.</strong> This is the most important part. You spent 30 minutes scrolling on social media? We’ve all been there. Write that down. Power through the shame.</li>\r\n</ul>', 1);

--
-- Gegevens worden geëxporteerd voor tabel `pages`
--

INSERT INTO `pages` (`pageid`, `url`, `title`, `content`, `active`) VALUES
(1, '/', 'The KK Initiative', '<p>A better world</p><p>\r\nEmpty shelves in our supermarkets. People ignoring the call for isolation. The president of the United States trying \r\nto buy an international pharmaceutical company to secure a vaccine just for US citizens. We\'ve all seen the state of \r\nthe world as it is now. And somewhere deep in our hearts, we draw a similar conclusion. This is not the way life is \r\nmeant to be. Somewhere along the path we took the wrong turn. And we stopped believing we can change anything. Afterall, \r\nwhat is one voice in a world dominated by global companies and governments more willing to serve them than the  people \r\nthey are supposed to protect.  \r\n</p><p>\r\nBut what if I tell you change is possible? And that one voice can make a world of difference? We see examples around \r\nus every day. Doctors and nurses sacrificing their private time and even risking their lives to fight for those that \r\nare otherwise helpless. People banding together to provide food and support to those in need. We don\'t have to live \r\nin a world determined by corporate greed and selfish ambitions. You can change things. Your voice matters. You matter. \r\nThe world isn\'t filled with selfish people. There\'s good people all around you. And all they need is to start believing \r\nchange can happen too. Change can start with you. Right here. Right now. All we need to do is to start learning from \r\neach other. And  become closer to one another. So we can finally stop being scared. It\'s up to you. You can do this. \r\nWe can do this. Everything in our life is a choice. And today we can choose a different path. Join us. Get together. \r\nWe need your help as much as you need ours. Together we can make a difference. Together we can make a better world.\r\n</p>', 1);

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`userid`, `username`, `userpassword`, `userlevel`) VALUES
(1, 'kangaroo', 'koala', 1),
(2, 'koala', 'kangaroo', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
