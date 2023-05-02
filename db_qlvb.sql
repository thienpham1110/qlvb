-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 31, 2023 lúc 10:56 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_qlvb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `capnhat`
--

CREATE TABLE `capnhat` (
  `maupdate` int(100) NOT NULL,
  `sovanban` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noidungupdate` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `file`
--

CREATE TABLE `file` (
  `mafile` int(250) NOT NULL,
  `sovanban` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tenfile` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `maloai` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tenloai` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `noibanhanh`
--

CREATE TABLE `noibanhanh` (
  `manoibanhanh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tennoibanhanh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quantri`
--

CREATE TABLE `quantri` (
  `username` varchar(30) NOT NULL,
  `matkhau` varchar(32) DEFAULT NULL,
  `hoten` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `quyen` int(1) NOT NULL COMMENT '1:  supper admin, 2:nhan viên, 3:...'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `quantri`
--

INSERT INTO `quantri` (`username`, `matkhau`, `hoten`, `quyen`) VALUES
('abcd', '81dc9bdb52d04dc20036dbd8313ed055', 'Phạm Hồng Thiên', 2),
('admin', '6a30c7e55b5792f2ce48d88d0536ebe5', 'Thiên Phạm', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vanban`
--

CREATE TABLE `vanban` (
  `mavanban` int(250) NOT NULL,
  `sovanban` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `manoibanhanh` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `maloai` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `trichyeu` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaybanhanh` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nguoiky` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `loailuutru` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vanbanden`
--

CREATE TABLE `vanbanden` (
  `mavanbanden` int(250) NOT NULL,
  `sovanban` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngayden` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sotrang` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nguoinhan` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vanbandi`
--

CREATE TABLE `vanbandi` (
  `mavanbandi` int(250) NOT NULL,
  `sovanban` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaydi` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sotrang` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `soluongban` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nguoigui` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vanbannoibo`
--

CREATE TABLE `vanbannoibo` (
  `mavanbannb` int(250) NOT NULL,

  `sovanban` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaybanhanh` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sotrang` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `soluongban` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nguoinhan` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `capnhat`
--
ALTER TABLE `capnhat`
  ADD PRIMARY KEY (`maupdate`),
  ADD KEY `sovanban` (`sovanban`);

--
-- Chỉ mục cho bảng `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`mafile`),
  ADD KEY `sovanban` (`sovanban`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`maloai`);

--
-- Chỉ mục cho bảng `noibanhanh`
--
ALTER TABLE `noibanhanh`
  ADD PRIMARY KEY (`manoibanhanh`);

--
-- Chỉ mục cho bảng `quantri`
--
ALTER TABLE `quantri`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `vanban`
--
ALTER TABLE `vanban`
  ADD PRIMARY KEY (`mavanban`),
  ADD KEY `sovanban` (`sovanban`),
  ADD KEY `maloai` (`maloai`),
  ADD KEY `manoibanhanh` (`manoibanhanh`);

--
-- Chỉ mục cho bảng `vanbanden`
--
ALTER TABLE `vanbanden`
  ADD PRIMARY KEY (`mavanbanden`),
  ADD KEY `sovanban` (`sovanban`);

--
-- Chỉ mục cho bảng `vanbandi`
--
ALTER TABLE `vanbandi`
  ADD PRIMARY KEY (`mavanbandi`),
  ADD KEY `sovanban` (`sovanban`);

--
-- Chỉ mục cho bảng `vanbannoibo`
--
ALTER TABLE `vanbannoibo`
  ADD PRIMARY KEY (`mavanbannb`),
  ADD KEY `sovanban` (`sovanban`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `capnhat`
--
ALTER TABLE `capnhat`
  MODIFY `maupdate` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `file`
--
ALTER TABLE `file`
  MODIFY `mafile` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vanbanden`
--
ALTER TABLE `vanbanden`
  MODIFY `mavanbanden` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vanbandi`
--
ALTER TABLE `vanbandi`
  MODIFY `mavanbandi` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vanbannoibo`
--
ALTER TABLE `vanbannoibo`
  MODIFY `mavanbannb` int(250) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

-- --
-- -- Các ràng buộc cho bảng `capnhat`
-- --
-- ALTER TABLE `capnhat`
--   ADD CONSTRAINT `capnhat_ibfk_1` FOREIGN KEY (`sovanban`) REFERENCES `vanban` (`sovanban`) ON UPDATE CASCADE;

-- --
-- -- Các ràng buộc cho bảng `file`
-- --
-- ALTER TABLE `file`
--   ADD CONSTRAINT `file_ibfk_1` FOREIGN KEY (`sovanban`) REFERENCES `vanban` (`sovanban`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `vanban`
--
ALTER TABLE `vanban`
  ADD CONSTRAINT `vanban_ibfk_1` FOREIGN KEY (`maloai`) REFERENCES `loai` (`maloai`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vanban_ibfk_2` FOREIGN KEY (`manoibanhanh`) REFERENCES `noibanhanh` (`manoibanhanh`) ON UPDATE CASCADE;

-- --
-- -- Các ràng buộc cho bảng `vanbanden`
-- --
-- ALTER TABLE `vanbanden`
--   ADD CONSTRAINT `vanbanden_ibfk_1` FOREIGN KEY (`sovanban`) REFERENCES `vanban` (`sovanban`) ON UPDATE CASCADE;

-- --
-- -- Các ràng buộc cho bảng `vanbandi`
-- --
-- ALTER TABLE `vanbandi`
--   ADD CONSTRAINT `vanbandi_ibfk_1` FOREIGN KEY (`sovanban`) REFERENCES `vanban` (`sovanban`) ON UPDATE CASCADE;

-- --
-- -- Các ràng buộc cho bảng `vanbannoibo`
-- --
-- ALTER TABLE `vanbannoibo`
--   ADD CONSTRAINT `vanbannoibo_ibfk_1` FOREIGN KEY (`sovanban`) REFERENCES `vanban` (`sovanban`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
