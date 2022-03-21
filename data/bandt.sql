
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laptop`
--
CREATE DATABASE IF NOT EXISTS `bandt` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bandt`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `maadmin` int(11) NOT NULL,
  `hoten` varchar(200) NOT NULL,
  `tendangnhap` varchar(10) NOT NULL,
  `matkhau` varchar(12) NOT NULL,
  `dienthoai` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ngaysinh` date DEFAULT NULL,
  PRIMARY KEY (`maadmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`maadmin`, `hoten`, `tendangnhap`, `matkhau`, `dienthoai`, `email`, `ngaysinh`) VALUES
(1, 'Nguyễn Tuấn Cảnh', 'canh', '1234', '0969710904', 'tuancanh278@gmail.com', NULL),
(2, 'Nguyễn Tuấn Linh', 'atuan', '1234', '098775443', 'anhtuan@gmail.com', NULL),
(3, 'Nguyễn Văn A', 'vana', '1234', '0989521469', 'vana@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ctdondathang`
--

CREATE TABLE IF NOT EXISTS `ctdondathang` (
  `masp` int(11) NOT NULL,
  `madh` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` float NOT NULL,
  `khuyenmai` int(11) DEFAULT NULL,
  PRIMARY KEY (`masp`,`madh`),
  KEY `madh` (`madh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctdondathang`
--

INSERT INTO `ctdondathang` (`masp`, `madh`, `soluong`, `dongia`, `khuyenmai`) VALUES
(1, 9, 1, 4999000, 12),
(3, 10, 1, 5850000, 10),
(26, 9, 1, 12120000, NULL),
(28, 9, 1, 10870000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dondathang`
--

CREATE TABLE IF NOT EXISTS `dondathang` (
  `madh` int(11) NOT NULL AUTO_INCREMENT,
  `makh` int(11) NOT NULL,
  `ngaydathang` datetime NOT NULL,
  `tennguoinhan` varchar(50) NOT NULL,
  `diachinguoinhan` varchar(200) NOT NULL,
  `dienthoai` varchar(15) NOT NULL,
  `yeucau` varchar(100) DEFAULT NULL,
  `trangthai` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`madh`),
  KEY `makh` (`makh`),
  KEY `makh_2` (`makh`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `dondathang`
--

INSERT INTO `dondathang` (`madh`, `makh`, `ngaydathang`, `tennguoinhan`, `diachinguoinhan`, `dienthoai`, `yeucau`, `trangthai`) VALUES
(9, 20, '0000-00-00 00:00:00', 'nguyen tuan canh', 'hanoi', '0969710904', '12132', '0'),
(10, 4, '0000-00-00 00:00:00', 'trang', 'hanoi', '0998987987', 'fsmd', '0'),
(11, 4, '0000-00-00 00:00:00', 'trang', 'hanoi', '0998987987', 'fsmd', '0');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE IF NOT EXISTS `khachhang` (
  `makh` int(11) NOT NULL AUTO_INCREMENT,
  `hoten` varchar(50) NOT NULL,
  `diachi` varchar(300) NOT NULL,
  `tendangnhap` varchar(30) NOT NULL,
  `matkhau` varchar(15) NOT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` int(11) DEFAULT NULL,
  `dienthoai` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ngaydk` datetime NOT NULL,
  PRIMARY KEY (`makh`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`makh`, `hoten`, `diachi`, `tendangnhap`, `matkhau`, `ngaysinh`, `gioitinh`, `dienthoai`, `email`, `ngaydk`) VALUES
(1, 'Nguyễn Văn Nam', 'TP.HCM', 'namnguyen23', '1234', '1987-05-20', 1, '0162786545', 'nam@gmail.com', '2015-05-12 00:00:00'),
(2, 'Lê Thị Na', 'Đà nẵng', 'nalt', '2334', '1991-05-21', 0, '0987463653', 'lethina@gmail.com', '2013-04-15 00:00:00'),
(3, 'Trần Xuân Dũng', 'Hà Nội', 'dungxt', '36536', '1989-09-18', 1, '0965423836', 'trandung12@gmail.com', '2014-05-12 00:00:00'),
(4, 'Đỗ Văn Lâm', 'Đà Lạt', 'lamdv', '12234', '1996-05-06', 1, '0984684325', 'lam34@gmail.com', '2014-05-20 00:00:00'),
(14, 'truong', 'ha noi', 'truong', '1234', '0000-00-00', 1, '987666788', 'truong@gmail.com', '0000-00-00 00:00:00'),
(16, 'ADGDG BK', 'FTYFKTFJ', 'HAI', '1234', '1997-06-17', 0, '798687466', 'FGFHJF@GMAIL.COM', '2015-06-12 09:04:37'),
(17, 'luan123', 'thai binh', 'luan123', '123456', '1990-06-30', 1, '1232423534', 'luan123@gmail.com', '2015-06-12 09:06:05'),
(18, 'luan123', 'thai binh', 'luan123', '123456', '1990-06-30', 1, '1232423534', 'luan123@gmail.com', '2015-06-12 09:06:51'),
(19, 'huynguyen', 'hanoi', 'huy nguyen', '12345', '1991-06-13', 0, '987765468', 'huy76@gmail.com', '2015-06-12 09:57:30'),
(20, 'nguyen cong truong', 'ha noi', 'truong177', '1771991', '1991-06-19', 1, '1649591615', 'congtruong1991@gmail.com', '2015-06-12 11:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE IF NOT EXISTS `loaisp` (
  `maloai` int(11) NOT NULL AUTO_INCREMENT,
  `tenloai` varchar(200) NOT NULL,
  `manhom` int(11) DEFAULT NULL,
  PRIMARY KEY (`maloai`),
  KEY `manhom` (`manhom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `loaisp`
--

INSERT INTO `loaisp` (`maloai`, `tenloai`, `manhom`) VALUES
(1, 'asus', 1),
(2, 'dell', 1),
(3, 'hp', 1),
(4, 'acer', 1),
(5, 'macbook', 1),
(6, 'lenovo', 1),
(7, 'sony vaio', 1),
(8, 'Bàn phím', 2),
(9, 'Chuột', 2),
(10, 'sạc laptop', 2),
(11, 'đế tản nhiệt', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE IF NOT EXISTS `nhacungcap` (
  `mancc` int(11) NOT NULL AUTO_INCREMENT,
  `tenncc` varchar(200) NOT NULL,
  `diachi` varchar(300) NOT NULL,
  `dienthoai` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `mota` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`mancc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`mancc`, `tenncc`, `diachi`, `dienthoai`, `email`, `website`, `logo`, `mota`) VALUES
(1, 'KIm Long center', 'Quận 1-Tp.HCM', '023764872', 'KImlonG@gmail.com', 'kimlongcenter.com', NULL, NULL),
(2, 'Lazada', '232 Đống Đa-Hà Nội', '0324623845', 'lazada@gmail.com', 'lazada.com', NULL, NULL),
(3, 'Vinh Hiển Lộc Tài', 'Hà Nội', '098423852', 'vinhhien@gmail.com', NULL, NULL, NULL),
(4, 'PhucAnh Smart World', 'Hà Nội', '064583238', 'Phucanh@gmail.com', 'Phucanh.com.vn', NULL, NULL),
(5, 'Bach Khoa Mien Trung', 'Huế', '09346234', '', NULL, NULL, NULL),
(6, 'Vinh Hung Computer', 'Hà Nội', '01243724534', 'vinhhung243@gmail.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nhomsp`
--

CREATE TABLE IF NOT EXISTS `nhomsp` (
  `manhom` int(11) NOT NULL AUTO_INCREMENT,
  `tennhom` varchar(100) NOT NULL,
  PRIMARY KEY (`manhom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `nhomsp`
--

INSERT INTO `nhomsp` (`manhom`, `tennhom`) VALUES
(1, 'Laptop'),
(2, 'Phukien');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE IF NOT EXISTS `sanpham` (
  `masp` int(11) NOT NULL AUTO_INCREMENT,
  `tensp` varchar(100) NOT NULL,
  `maloai` int(11) NOT NULL,
  `mancc` int(11) NOT NULL,
  `hinhanh` varchar(100) DEFAULT NULL,
  `dongia` float DEFAULT NULL,
  `khuyenmai` int(11) DEFAULT NULL,
  `mota` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`masp`),
  KEY `maloai` (`maloai`),
  KEY `maloai_2` (`maloai`),
  KEY `mancc` (`mancc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `maloai`, `mancc`, `hinhanh`, `dongia`, `khuyenmai`, `mota`) VALUES
(1, 'Laptop ASUS P550LDV-XO518D 15.6inch (Đen)', 1, 3, 'laptop-asus-p550ldv-xo518d-15-6inch.jpg', 4999000, 12, '<p>M&agrave;u Đen</p>\r\n\r\n<p>Bộ vi xử l&yacute; Intel Core i7 Tốc độ CPU (GHz) 2.00</p>\r\n\r\n<p>K&iacute;ch thước m&agrave;n h&igrave;nh 15.6</p>\r\n\r\n<p>Xử l&yacute; đồ họa Nvidia GT820M 2GB Graphics</p>\r\n\r\n<p>memory (MB) 4096 Dung lượng ổ cứng (GB) 500.0</p>\r\n\r\n<p>Model P550LDV-XO518D</p>\r\n\r\n<p>Hệ điều h&agrave;nh DOS</p>\r\n\r\n<p>K&iacute;ch thước sản phẩm (D x R x C cm) 34.8x25.1x2.3</p>\r\n\r\n<p>Bảo h&agrave;nh 24 th&aacute;ng bảo h&agrave;nh điện tử</p>\r\n\r\n<p>Trọng lượng (KG) 2.2 Sản xuất tại Trung Quốc</p>\r\n\r\n<p>Bộ nhớ RAM (GB) 4096</p>\r\n'),
(2, 'Laptop Asus TP550LA-CJ040H 15.6inch Touch (Đen)', 1, 4, 'laptop-asus-tp550la-cj040h-15-6inch.jpg', 10090000, 0, '<ul>\r\n	<li>M&agrave;u Đen</li>\r\n	<li>Bộ vi xử l&yacute; Intel Core i3</li>\r\n	<li>Tốc độ CPU (GHz) 2.70</li>\r\n	<li>K&iacute;ch thước m&agrave;n h&igrave;nh 15.6</li>\r\n	<li>Loại m&agrave;n h&igrave;nh LED</li>\r\n	<li>Xử l&yacute; đồ họa Intel HD Graphics 4400 Graphics</li>\r\n	<li>memory (MB) 4096</li>\r\n	<li>Dung lượng ổ cứng (GB) 500.0</li>\r\n	<li>Độ ph&acirc;n giải camera (MP) 1.3</li>\r\n	<li>Model TP550LA-CJ040H</li>\r\n	<li>Hệ điều h&agrave;nh Windows 8.1</li>\r\n	<li>K&iacute;ch thước sản phẩm (D x R x C cm) 36 x 26.1 x 2.72</li>\r\n	<li>Bảo h&agrave;nh 24 th&aacute;ng (theo sổ bảo h&agrave;nh)</li>\r\n	<li>Trọng lượng (KG) 2.6</li>\r\n	<li>Sản xuất tại Trung Quốc</li>\r\n	<li>Bộ nhớ RAM (GB) 4</li>\r\n</ul>\r\n'),
(3, 'Laptop Asus X453MA-BING-WX180B 14inch (Đen)', 1, 3, 'laptop-asus-x453ma-bing-wx180b-14inch.jpg', 5850000, 10, '<ul>\r\n	<li>M&agrave;u Đen</li>\r\n	<li>Bộ vi xử l&yacute; Intel Core 2 Duo Tốc độ CPU (GHz) 2.16</li>\r\n	<li>K&iacute;ch thước m&agrave;n h&igrave;nh 14.0</li>\r\n	<li>Xử l&yacute; đồ họa Intel HD Graphics Dung lượng ổ cứng (GB) 500.0</li>\r\n	<li>Model X453MA-BING-WX180B</li>\r\n	<li>Hệ điều h&agrave;nh Windows 8.1</li>\r\n	<li>K&iacute;ch thước sản phẩm (D x R x C cm) 24 x 24 x 34</li>\r\n	<li>Bảo h&agrave;nh 24 th&aacute;ng bảo h&agrave;nh điện từ</li>\r\n	<li>Trọng lượng (KG) 1.96</li>\r\n	<li>Sản xuất tại Trung Quốc Bộ nhớ trong (MB) 2048</li>\r\n</ul>\r\n'),
(4, 'Laptop Asus T100TA-DK046H 10.1inch (Trắng)', 1, 6, 'laptop-asus-t100ta-dk046h-10-1inch.jpg', 8350000, 0, '<ul>\r\n	<li>Loại pin 2 Cell</li>\r\n	<li>M&agrave;u X&aacute;m</li>\r\n	<li>Tốc độ CPU (GHz) 1.46</li>\r\n	<li>K&iacute;ch thước m&agrave;n h&igrave;nh 10.1</li>\r\n	<li>Xử l&yacute; đồ họa Intel HD Graphics</li>\r\n	<li>Dung lượng ổ cứng (GB) 500.0 Độ ph&acirc;n giải camera (MP) 0.3</li>\r\n	<li>Model T100TA-DK046H</li>\r\n	<li>Hệ điều h&agrave;nh Windows 8.1</li>\r\n	<li>K&iacute;ch thước sản phẩm (D x R x C cm) 35x30x5</li>\r\n	<li>Bảo h&agrave;nh 24 th&aacute;ng bằng Bảo h&agrave;nh điện tử</li>\r\n	<li>Trọng lượng (KG) 1.5</li>\r\n	<li>Bộ nhớ trong (GB)</li>\r\n	<li>500 Bộ nhớ trong (MB) 2048</li>\r\n</ul>\r\n'),
(5, 'Laptop Asus X553MA-XX574D 15.6inch (Đen)', 1, 3, 'laptop-asus-x553ma-xx574d-15-6inch.jpg', 5699000, 18, '<ul>\r\n	<li>Loại pin 4 Cell</li>\r\n	<li>M&agrave;u Đen Cổng kết nối 1 x COMBO audio jack; 1 x Line-in Jack;1 x VGA port/Mini D-sub 15-pin for external monitor; 1 x USB 3.0 port(s);1 x USB 2.0 port(s);1 x RJ45 LAN Jack for LAN insert;1 x HDMI;1 x SD card reader;1X AC adapter plug Kết nối Wifi 802.11 b/g/n, BT 4.0</li>\r\n	<li>Tốc độ CPU (GHz) 2.16</li>\r\n	<li>Độ ph&acirc;n giải m&agrave;n h&igrave;nh (pixels) 1366 x 768px</li>\r\n	<li>K&iacute;ch thước m&agrave;n h&igrave;nh 15.6</li>\r\n	<li>Loại m&agrave;n h&igrave;nh LED Auto HD</li>\r\n	<li>Xử l&yacute; đồ họa Intel HD Graphics</li>\r\n	<li>Độ ph&acirc;n giải camera (MP) 0.3</li>\r\n	<li>Hỗ trợ thẻ nhớ SD Model X553MA-XX574D</li>\r\n	<li>Số lượng nh&acirc;n 2 Hệ điều h&agrave;nh FreeDOS</li>\r\n	<li>K&iacute;ch thước sản phẩm (D x R x C cm) 25.2 x 28 x 2.53</li>\r\n	<li>Loại Laptop</li>\r\n	<li>Bảo h&agrave;nh 24 Trọng lượng (KG) 2.2</li>\r\n	<li>Bộ nhớ RAM (GB) 2</li>\r\n</ul>\r\n'),
(6, 'Laptop Asus P550LNV-XO582D 15.6inch (Đen)', 1, 3, 'laptop-asus-p550lnv-xo582d-15-6inch.jpg', 15550000, 20, '<ul>\r\n	<li>Bộ vi xử l&yacute; Intel Core i7 Tốc độ CPU (GHz) 2.00</li>\r\n	<li>K&iacute;ch thước m&agrave;n h&igrave;nh 15.6</li>\r\n	<li>Xử l&yacute; đồ họa NVIDIA GeForce GT840M 2GB + Intel HD Graphics 4400</li>\r\n	<li>Graphics memory (MB) 2048</li>\r\n	<li>Dung lượng ổ cứng (GB) 1024.0</li>\r\n	<li>Độ ph&acirc;n giải camera (MP) 0.3</li>\r\n	<li>Hệ điều h&agrave;nh DOS</li>\r\n	<li>K&iacute;ch thước sản phẩm (D x R x C cm) 2.53x24.5x34.5</li>\r\n	<li>Bảo h&agrave;nh 24 th&aacute;ng bằng h&oacute;a đơn Trọng lượng (KG) 2</li>\r\n	<li>Bộ nhớ trong (MB) 4096</li>\r\n</ul>\r\n'),
(7, 'Laptop Dell N3543-4450BK 15.6inch (Đen)', 2, 4, 'laptop-dell-n3543-4450bk-15-6inch.jpg', 9490000, 0, '<ul>\r\n	<li>M&agrave;u Đen</li>\r\n	<li>Bộ vi xử l&yacute; Intel Core i3</li>\r\n	<li>Tốc độ CPU (GHz) 2.00</li>\r\n	<li>K&iacute;ch thước m&agrave;n h&igrave;nh 15.6</li>\r\n	<li>Dung lượng ổ cứng (GB) 500.0</li>\r\n	<li>Model Dell N3543-4450BK</li>\r\n	<li>Hệ điều h&agrave;nh Windows 8.1</li>\r\n	<li>K&iacute;ch thước sản phẩm (D x R x C cm) 25.9x38x2.18</li>\r\n	<li>Bảo h&agrave;nh 12 th&aacute;ng bằng tem bảo h&agrave;nh</li>\r\n	<li>rọng lượng (KG) 4</li>\r\n	<li>Sản xuất tại Trung Quốc</li>\r\n</ul>\r\n'),
(8, 'Laptop Dell Latitude E6430 14inch (Xám)', 2, 5, 'laptop-dell-latitude-e6430-14inch-xam.jpg', 11899000, 0, '<ul>\r\n	<li>M&agrave;u X&aacute;m</li>\r\n	<li>Bộ vi xử l&yacute; Intel Core i5 Tốc độ CPU (GHz) 2.90</li>\r\n	<li>Xử l&yacute; đồ họa intel Graphics HD4000 Graphics memory (MB) 4096</li>\r\n	<li>Dung lượng ổ cứng (GB) 320.0</li>\r\n	<li>Model LATITUDE E6430 I5 3380M 320GB 4GB</li>\r\n	<li>Hệ điều h&agrave;nh Windows 7 Professional</li>\r\n	<li>K&iacute;ch thước sản phẩm (D x R x C cm) 30.34x8.93x47.58</li>\r\n	<li>Bảo h&agrave;nh 12 th&aacute;ng bằng phiếu bảo h&agrave;nh</li>\r\n	<li>Trọng lượng (KG) 0.01</li>\r\n	<li>Sản xuất tại Trung Quốc (Designed in U.S)</li>\r\n</ul>\r\n'),
(9, 'Laptop Dell 5480 (i741T2) 14inch (Xám)', 2, 1, 'laptop-dell-5480-i741t2-14inch-xam.jpg', 15990000, 0, '<ul>\r\n	<li>M&agrave;u M&agrave;u x&aacute;m</li>\r\n	<li>Bộ vi xử l&yacute; Intel Core i7 Tốc độ CPU (GHz) 2.40</li>\r\n	<li>K&iacute;ch thước m&agrave;n h&igrave;nh 14.0</li>\r\n	<li>Xử l&yacute; đồ họa Nvidia GeForce GT 830M 2GB + Integrated Intel&reg; HD Graphics 5500 Graphics memory (MB) 2048</li>\r\n	<li>Dung lượng ổ cứng (GB) 1000.0</li>\r\n	<li>Độ ph&acirc;n giải camera (MP) 0.3</li>\r\n	<li>Model Dell V5480</li>\r\n	<li>Hệ điều h&agrave;nh DOS K&iacute;ch thước sản phẩm (D x R x C cm) 34.6 x 24.6 x 2.5</li>\r\n	<li>Bảo h&agrave;nh 12 th&aacute;ng (bằng phiếu bảo h&agrave;nh)</li>\r\n	<li>Trọng lượng (KG) 1.8 Sản xuất tại Malaysia</li>\r\n	<li>Bộ nhớ trong (MB) 4096</li>\r\n</ul>\r\n'),
(10, 'Laptop Dell Inspiron N7547 15.6inch Touch (Bạc)', 2, 4, 'laptop-dell-inspiron-n7547-15-6inch-touch.jpg', 18199000, 0, '<ul>\r\n	<li>M&agrave;u Bạc</li>\r\n	<li>Bộ vi xử l&yacute; Intel Core i7</li>\r\n	<li>Tốc độ CPU (GHz) 2.00</li>\r\n	<li>K&iacute;ch thước m&agrave;n h&igrave;nh 15.6</li>\r\n	<li>Xử l&yacute; đồ họa intel Graphics HD4400 Graphics memory (MB) 12288</li>\r\n	<li>Dung lượng ổ cứng (GB) 1024.0</li>\r\n	<li>Model Inspiron N7547</li>\r\n	<li>Hệ điều h&agrave;nh Windows 8</li>\r\n	<li>K&iacute;ch thước sản phẩm (D x R x C cm) 35.44x6.63x54.34</li>\r\n	<li>Bảo h&agrave;nh 12 th&aacute;ng (bằng phiếu bảo h&agrave;nh)</li>\r\n	<li>Trọng lượng (KG) 2.2 Bộ nhớ RAM (GB) 8</li>\r\n</ul>\r\n'),
(11, 'Laptop Dell N5547 15.6inch (Bạc)', 2, 2, 'laptop-dell-n5547-15-6inch-bac.jpg', 14890000, NULL, 'Màu	Bạc\r\nBộ vi xử lý	Intel Core i7\r\nTốc độ CPU (GHz)	2.00\r\nKích thước màn hình	15.6\r\nXử lý đồ họa	AMD Raedon HD R7 M265 2GB+ Intel HD Graphic 4400\r\nGraphics memory (MB)	2048\r\nDung lượng ổ cứng (GB)	1000.0\r\nĐộ phân giải camera (MP)	0.3\r\nModel	N5547\r\nHệ điều hành	DOS\r\nKích thước sản phẩm (D x R x C cm)	2.2 x 25 x38\r\nBảo hành	12 tháng (bằng phiếu bảo hành)\r\nTrọng lượng (KG)	2.2\r\nSản xuất tại	Malaysia\r\nBộ nhớ RAM (GB)	8192\r\nBộ nhớ trong (MB)	8192'),
(12, 'Laptop Dell I7548-4271SLV 15.6inch (Đen)', 2, 1, 'laptop-dell-i7548-4271slv-15-6inch.jpg', 19950000, NULL, 'Màu	Xám\r\nBộ vi xử lý	Intel Core i7\r\nTốc độ CPU (GHz)	2.40\r\nKích thước màn hình	15.6\r\nXử lý đồ họa	Intel HD Graphics 5500\r\nDung lượng ổ cứng (GB)	1000.0\r\nĐộ phân giải camera (MP)	1.3\r\nModel	I7548-4271SLV\r\nHệ điều hành	Windows 8.1\r\nKích thước sản phẩm (D x R x C cm)	38x25x2\r\nBảo hành	12 tháng bằng hóa đơn\r\nTrọng lượng (KG)	2.5 kg\r\nSản xuất tại	Trung Quốc (Designed in U.S)'),
(13, 'Laptop Dell Inspiron 13 7347 13.3inch (Bạc)', 2, 6, 'laptop-dell-inspiron-13-7347-13-3inch-bac.jpg', 17490000, NULL, 'Màu	Bạc\r\nBộ vi xử lý	Intel Core i5\r\nTốc độ CPU (GHz)	2.70\r\nKích thước màn hình	13.3\r\nXử lý đồ họa	Intel HD Graphics 4400\r\nGraphics memory (MB)	500\r\nDung lượng ổ cứng (GB)	8.0\r\nModel	7347\r\nHệ điều hành	Windows 8.1\r\nKích thước sản phẩm (D x R x C cm)	33.01 x 1.94 x 22.2\r\nBảo hành	12 Tháng (bằng Phiếu bảo hành)\r\nTrọng lượng (KG)	1.66\r\nSản xuất tại	Mỹ'),
(14, 'Laptop Dell Inspiron 3543-70055106 15.6inch (Đen)', 2, 5, 'laptop-dell-inspiron-3543-70055106-15-6inch.jpg', 13050000, NULL, 'Màu	Black\r\nBộ vi xử lý	Intel Core i5\r\nTốc độ CPU (GHz)	2.20\r\nKích thước màn hình	15.6\r\nGraphics memory (MB)	2048\r\nDung lượng ổ cứng (GB)	500.0\r\nModel	3543-70055106\r\nHệ điều hành	Free DOS \r\nBảo hành	12 tháng bằng hóa đơn mua hàng\r\nTrọng lượng (KG)	2\r\nSản xuất tại	Trung Quốc\r\nBộ nhớ trong (MB)	4096'),
(15, 'Laptop HP Probook 450 J8K83PA 15.6inch (Đen)', 3, 3, 'laptop-hp-probook-450-j8k83pa-15-6inch.jpg', 11190000, NULL, 'Màu	Đen\r\nBộ vi xử lý	Intel Core i3\r\nTốc độ CPU (GHz)	2.50\r\nKích thước màn hình	15.6\r\nXử lý đồ họa	AMD Radeon 8750M 2GB\r\nGraphics memory (MB)	2048\r\nDung lượng ổ cứng (GB)	500.0\r\nĐộ phân giải camera (MP)	0.0\r\nModel	Probook\r\nHệ điều hành	Free DOS (tương thích Windows 7, Windows 8)\r\nKích thước sản phẩm (D x R x C cm)	25.62x37.5x2.28\r\nBảo hành	24 tháng (bảo hành điện tử)\r\nTrọng lượng (KG)	2.4\r\nSản xuất tại	Trung Quốc\r\nBộ nhớ RAM (GB)	4'),
(16, 'Laptop HP 14-r041TU J6M10PA 14inch (Bạc)', 3, 2, 'laptop-hp-14-r041tu-j6m10pa-14inch-bac.jpg', 8940000, NULL, 'Loại pin	4 Cell\r\nMàu	Bạc\r\nBộ vi xử lý	Intel Core i3\r\nTốc độ CPU (GHz)	1.90\r\nKích thước màn hình	14.0\r\nDung lượng ổ cứng (GB)	500.0\r\nĐộ phân giải camera (MP)	0.3\r\nModel	14-r041TU J6M10PA\r\nHệ điều hành	DOS\r\nKích thước sản phẩm (D x R x C cm)	34.5 x 24.4 x 2.53\r\nBảo hành	12 tháng (bằng phiếu bảo hành)\r\nTrọng lượng (KG)	2.2\r\nBộ nhớ trong (MB)	4096'),
(17, 'Laptop HP 248 K3Y04PA 14inch (Bạc)', 3, 1, 'laptop-hp-248-k3y04pa-14inch-bac.jpg', 12410000, NULL, 'Loại pin	4 Cell\r\nBộ vi xử lý	Intel Core i5\r\nTốc độ CPU (GHz)	1.70\r\nKích thước màn hình	14.0\r\nXử lý đồ họa	Intel HD Graphics\r\nDung lượng ổ cứng (GB)	500.0\r\nĐộ phân giải camera (MP)	0.3\r\nHệ điều hành	DOS\r\nKích thước sản phẩm (D x R x C cm)	34.7 x 24.5 x 2.3\r\nTrọng lượng (KG)	2\r\nBộ nhớ trong (MB)	4096'),
(18, 'HP PAVILION 15 P100DX 15.6inch (Bạc)', 3, 1, 'hp-pavilion-15-p100dx-15-6inch-bac.jpg', 16650000, NULL, 'Màu	Silver\r\nBộ vi xử lý	Intel Core i7\r\nTốc độ CPU (GHz)	2.00\r\nKích thước màn hình	15.6\r\nXử lý đồ họa	Intel HD Graphics 4400\r\nDung lượng ổ cứng (GB)	750.0\r\nĐộ phân giải camera (MP)	1.3\r\nModel	P100DX\r\nHệ điều hành	Windows 8.1\r\nKích thước sản phẩm (D x R x C cm)	35 x 25 x 3\r\nBảo hành	12 tháng bằng tem bảo hành\r\nTrọng lượng (KG)	2.5\r\nBộ nhớ trong (MB)	6144'),
(19, 'Laptop HP Pavilion 15-P081TX i5-4210U 15.6inch (Bạc)', 3, 5, 'laptop-hp-pavilion-15-p081tx-i5-4210u-15-6inch-bac.jpg', 14790000, NULL, 'Màu	Bạc\r\nBộ vi xử lý	Intel Core i5\r\nTốc độ CPU (GHz)	1.70\r\nKích thước màn hình	15.6\r\nXử lý đồ họa	Nvidia GeForce GT830M\r\nGraphics memory (MB)	2048\r\nDung lượng ổ cứng (GB)	500.0\r\nĐộ phân giải camera (MP)	0.9\r\nModel	Pavilion 15-P081TX\r\nHệ điều hành	Windows 8.1\r\nKích thước sản phẩm (D x R x C cm)	38.5 x 26 x 2.4\r\nBảo hành	12 tháng bằng phiếu bảo hành\r\nTrọng lượng (KG)	2.4\r\nSản xuất tại	Trung Quốc (Designed in U.S)\r\nBộ nhớ RAM (GB)	4096'),
(20, 'Laptop Sony Vaio SVF15212CX/W 15.6inch (Trắng)', 7, 6, 'laptop-sony-vaio-svf15212cx-w-15-6inch.jpg', 11890000, NULL, 'Màu	Trắng\r\nModel	SVF15212CX/W\r\nKích thước sản phẩm (D x R x C cm)	30x23x3\r\nTrọng lượng (KG)	2.5\r\nHệ điều hành: Windows 8\r\nBộ vi xử lý: Intel Core i3 3227U 1.9Ghz-3Mb\r\nRAM 4GB\r\nỔ cứng: 500GB Intel Graphics 4000DVD±RW/DL\r\nMàn hình: 15.6" Full HD'),
(21, 'Laptop Sony SVF1421ECX/B 14.1inch (Đen) ', 7, 3, 'laptop-sony-svf1421ecx-b-14-1inch.jpg', 11990000, NULL, 'Màu	Đen\r\nBộ vi xử lý	Intel Core i3\r\nTốc độ CPU (GHz)	1.80\r\nKích thước màn hình	14.1\r\nXử lý đồ họa	Intel HD Graphics 4000\r\nDung lượng ổ cứng (GB)	500.0\r\nĐộ phân giải camera (MP)	1.3\r\nModel	SVF1421ECX/B\r\nHệ điều hành	Windows 8\r\nZoom quang	0.0\r\nKích thước sản phẩm (D x R x C cm)	33x23x2.7\r\nBảo hành	12 tháng bằng hóa đơn\r\nTrọng lượng (KG)	2.2\r\nSản xuất tại	Trung Quốc, Thương hiệu nhật bản'),
(22, 'Laptop Sony Vaio SVP13213CYB I5-4200U 13.3inch (Đen)', 7, 1, 'laptop-sony-vaio-svp13213cyb-i5-4200u-13-3inch.jpg', 20999000, NULL, 'Màu	Đen\r\nBộ vi xử lý	Intel Core i5\r\nTốc độ CPU (GHz)	1.60\r\nKích thước màn hình	13.3\r\nXử lý đồ họa	Intel Graphics HD4400\r\nGraphics memory (MB)	4\r\nDung lượng ổ cứng (GB)	128.0\r\nĐộ phân giải camera (MP)	0.3\r\nModel	SVP13213C / B\r\nHệ điều hành	Windows 8\r\nKích thước sản phẩm (D x R x C cm)	32.2 x 21.6 x 1.7\r\nBảo hành	Bảo Hành: 12 Tháng Khuyến Mãi: Túi Xách + Chuột Wireless Elecom \r\nTrọng lượng (KG)	1.1\r\nSản xuất tại	Trung Quốc (Designed in U.S)\r\nBộ nhớ RAM (GB)	4096'),
(23, 'Laptop Sony Vaio VNSVD13217PGB 11.6inch (Đen)', 7, 3, 'laptop-sony-vaio-vnsvd13217pgb-11-6inch.jpg', 49999000, 1, 'Màu	Đen\r\nBộ vi xử lý	Intel Core i7\r\nĐộ phân giải màn hình (pixels)	1920 x 1080\r\nKích thước màn hình	11.6\r\nLoại màn hình	Full HD\r\nXử lý đồ họa	Intel HD Graphics\r\nĐộ phân giải camera (MP)	0.3\r\nModel	VNSVD13217PGB\r\nHệ điều hành	Windows 8\r\nKích thước sản phẩm (D x R x C cm)	30x23x3\r\nTrọng lượng (KG)	2.5\r\nBộ nhớ RAM (GB)	8'),
(24, 'Laptop ACER Aspire E5 571-571-3747 NX.ML8SV.002 15.6inch (Đen)', 4, 1, 'laptop-acer-aspire-e5-571-571-3747.jpg', 8370000, NULL, 'Bộ vi xử lý	Intel Core i3\r\nKích thước màn hình	15.6\r\nDung lượng ổ cứng (GB)	500.0\r\nĐộ phân giải camera (MP)	0.3\r\nHệ điều hành	Free DOS \r\nKích thước sản phẩm (D x R x C cm)	38.1 x 25.6 x 2.5\r\nTrọng lượng (KG)	2.2\r\nBộ nhớ trong (GB)	4\r\nBộ nhớ trong (MB)	4096'),
(25, 'Laptop Acer Aspire E5-571G-59BZ NX.MRHSV.005 15.6inch (Đen)', 4, 3, 'laptop-acer-aspire-e5-571g-59bz.jpg', 12550000, NULL, 'Màu	Đen\r\nBộ vi xử lý	Intel Core i5\r\nTốc độ CPU (GHz)	2.20\r\nKích thước màn hình	15.6\r\nXử lý đồ họa	NVIDIA GeForce 820M 2GB + Intel HD Graphics 5500\r\nGraphics memory (MB)	2048\r\nDung lượng ổ cứng (GB)	500.0\r\nModel	Aspire E5-571G-59BZ NX.MRHSV.005\r\nHệ điều hành	Linux\r\nKích thước sản phẩm (D x R x C cm)	34 x 25 x 1\r\nBảo hành	12 tháng (bằng tem phụ)\r\nTrọng lượng (KG)	2\r\nSản xuất tại	Trung Quốc\r\nBộ nhớ trong (MB)	4096'),
(26, 'Laptop Acer Aspire E5-771-54PF NX.MNXSV.002 17.3inch (Iron)', 4, 4, 'laptop-acer-aspire-e5-771-54pf.jpg', 12120000, NULL, 'Chứng nhận	Chứng nhận hàng chính hãng\r\nBộ vi xử lý	Intel Core i5\r\nTốc độ CPU (GHz)	2.20\r\nKích thước màn hình	17.3\r\nDung lượng ổ cứng (GB)	500.0\r\nHệ điều hành	FreeDOS\r\nKích thước sản phẩm (D x R x C cm)	2.53x20.5x30.5\r\nBảo hành	12 tháng chính hãng (bằng hóa đơn mua hàng)\r\nTrọng lượng (KG)	1.7\r\nSản xuất tại	Chính hãng\r\nBộ nhớ RAM (GB)	4GB\r\nBộ nhớ trong (MB)	4096'),
(27, 'Laptop Lenovo G4030 880FY006GVN 14inch (Đen)', 6, 5, 'laptop-lenovo-g4030-880fy006gvn-14inch.jpg', 5540000, NULL, 'Bộ vi xử lý	Intel Core i3\r\nTốc độ CPU (GHz)	1.70\r\nKích thước màn hình	14.0\r\nDung lượng ổ cứng (GB)	500.0\r\nHệ điều hành	DOS\r\nKích thước sản phẩm (D x R x C cm)	34.9 x 23.5 x 3.3\r\nTrọng lượng (KG)	2\r\nBộ nhớ trong (MB)	2'),
(28, 'Laptop Lenovo Z507059441532 15.6inch (Bạc)', 6, 5, 'laptop-lenovo-z507059441532-15-6inch-bac.jpg', 10870000, NULL, 'Bộ vi xử lý	Intel Core i5\r\nTốc độ CPU (GHz)	1.90\r\nKích thước màn hình	15.6\r\nXử lý đồ họa	NVIDIA GeForce GT 820M\r\nGraphics memory (MB)	2048\r\nDung lượng ổ cứng (GB)	500.0\r\nĐộ phân giải camera (MP)	1.3\r\nModel	Z5070\r\nHệ điều hành	FreeDOS\r\nKích thước sản phẩm (D x R x C cm)	23.5 x 34.9 x 3.34\r\nBảo hành	12 tháng bằng Phiếu bảo hành\r\nTrọng lượng (KG)	2.1\r\nBộ nhớ trong (MB)	4096'),
(29, 'Laptop Lenovo G5070 (5941 - 2499) 15.6 inch (Đen)', 6, 2, 'laptop-lenovo-g5070-5941-2499-15-6-inch.jpg', 11590000, NULL, 'Màu	Đen\r\nTốc độ CPU (GHz)	1.60\r\nKích thước màn hình	15.6\r\nXử lý đồ họa	Intel HD \r\nGraphics memory (MB)	2\r\nModel	G5070\r\nHệ điều hành	Free DOS \r\nKích thước sản phẩm (D x R x C cm)	38.1x25.9x2.3\r\nBảo hành	12 tháng bằng Bảo hành điện tử\r\nTrọng lượng (KG)	2.2\r\nSản xuất tại	Trung Quốc\r\nBộ nhớ trong (GB)	500\r\nBộ nhớ trong (MB)	4096'),
(30, 'Laptop Apple Macbook Air MJVE2 13inch (Bạc)', 5, 1, 'laptop-apple-macbook-air-mjve2-13inch-bac.jpg', 20790000, NULL, 'Màu	Bạc\r\nBộ vi xử lý	Intel Core i5\r\nTốc độ CPU (GHz)	1.60\r\nKích thước màn hình	13.3\r\nXử lý đồ họa	Intel HD Graphics 6000\r\nDung lượng ổ cứng (GB)	127.0\r\nĐộ phân giải camera (MP)	0.0\r\nModel	Macbook Air 13-inch (MJVE2ZP/A)- Early 2015\r\nHệ điều hành	Không\r\nZoom quang	0.0\r\nKích thước sản phẩm (D x R x C cm)	30 x 19.2 x 1.7\r\nBảo hành	12 tháng (Bảo hành điện tử trên toàn cầu)\r\nTrọng lượng (KG)	1.08\r\nSản xuất tại	Trung Quốc\r\nBộ nhớ RAM (GB)	4096\r\nBộ nhớ trong (GB)	128\r\nBộ nhớ trong (MB)	4096'),
(31, 'Laptop Apple Macbook MGX72ZP/A 2014 13.3inch (Bạc)', 5, 3, 'laptop-apple-macbook-mgx92zp-a-2014.jpg', 25999000, NULL, 'Màu	BẠC\r\nBộ vi xử lý	Intel Core i5\r\nTốc độ CPU (GHz)	2.60\r\nKích thước màn hình	13.3\r\nXử lý đồ họa	Intel® Iris™ Pro Graphics 5100\r\nGraphics memory (MB)	8192\r\nDung lượng ổ cứng (GB)	128.0\r\nModel	MGX72ZP/A -PHIÊN BẢN 2014\r\nHệ điều hành	Mac OS X\r\nKích thước sản phẩm (D x R x C cm)	31.5 x 22 x 1.8\r\nBảo hành	12 tháng bằng bảo hành điện tử được tính kể từ ngày Active máy\r\nTrọng lượng (KG)	1.5\r\nSản xuất tại	Trung Quốc'),
(32, 'Laptop Apple Macbook Pro Retina MF839 13.3inch (Bạc)', 5, 3, 'laptop-apple-macbook-pro-retina-mf839.jpg', 27000000, NULL, 'Màu	silver\r\nBộ vi xử lý	Intel Core i5\r\nTốc độ CPU (GHz)	2.70\r\nKích thước màn hình	13.3\r\nXử lý đồ họa	6100\r\nGraphics memory (MB)	8\r\nDung lượng ổ cứng (GB)	128.0\r\nModel	2015\r\nKích thước sản phẩm (D x R x C cm)	31,4x21,9x1,8\r\nBảo hành	12 tháng bằng bảo hành điện tử\r\nTrọng lượng (KG)	1.57\r\nSản xuất tại	Trung Quốc'),
(33, 'Chuột hồng ngoại Elecom M-Y4AURRD Đỏ', 9, 4, '151.0379.36861.jpg', 99000, NULL, 'Chuột hồng ngoại Elecom M-Y4AURRD Đỏ'),
(34, 'Chuột quang không dây Elecom M-BL21DBBK Đen', 9, 6, '35010-1(1).jpg', 450000, 10, 'Chuột quang không dây Elecom M-BL21DBBK Đen'),
(35, 'Chuột quang E-BLUE - Cobra II : EMS 151BK', 9, 1, '13(3).jpg', 299000, NULL, 'Chuột quang E-BLUE - Cobra II : EMS 151BK'),
(36, 'Chuột quang có dây LOGITECH M105', 9, 5, '12(3).jpg', 145000, NULL, 'Chuột quang có dây LOGITECH M105'),
(37, 'bộ-bàn-phím-và-chuột-game', 8, 5, 'bo-ban-phim-va-chuot-game.jpg', 540000, NULL, NULL),
(38, 'bộ-bàn-phím-và-chuột-quang-không-dây', 8, 6, 'bo-ban-phim-va-chuot-quang-khong-day.jpg', 350000, NULL, NULL),
(40, 'Sạc Laptop Dell', 10, 5, 'sac-laptop-dell.jpg', 245000, NULL, '- Hãng sản xuất: Dell\r\n- Dành cho: Tất cả notebook Dell (Inspiron & Vostro)\r\n- Điện áp vào: 110V – 240V\r\n- Điện áp ra: 19.5V - 4.62A\r\n- Xuất xử:Trung Quốc'),
(41, 'đế-tản-nhiệt-2-quạt', 11, 1, 'de-tan-nhiet-2-quat.jpg', 189000, NULL, 'Có thể do quá trình sử dụng lâu ngày, có thể do sử dụng với hiệu suất cao, cũng có thể do hoạt động trong một môi trường không tốt,...đều có thể làm cho laptop của chúng ta bị nóng hơn, gây cảm giác khó chịu khi sử dụng cũng như càng ảnh hưởng nghiêm trọng hơn nếu không giải quyết ngay. Thì bấy giờ Đế tản nhiệt 2 quạt Shinice K2 là một lựa chọn tối ưu giúp chúng ta giải quyết mọi vấn đề vừa nêu.\r\nVới thật nhiều những tính năng Đế tản nhiệt 2 quạt Shinice K2 là thiết bị không thể thiếu để đồng hành cùng chiếc laptop của bạn.');

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE IF NOT EXISTS `tintuc` (
  `matintuc` int(11) NOT NULL AUTO_INCREMENT,
  `tieude` varchar(200) NOT NULL,
  `hinhanh` varchar(50) DEFAULT NULL,
  `noidung` varchar(20000) DEFAULT NULL,
  `ngaythang` datetime NOT NULL,
  PRIMARY KEY (`matintuc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`matintuc`, `tieude`, `hinhanh`, `noidung`, `ngaythang`) VALUES
(1, 'Đánh giá laptop lai Asus Transformer Book T300 Chi', NULL, 'Transformer Book T300 Chi là mẫu laptop lai nền tảng Windows 8.1 vừa được Asus mang đến thị trường Việt Nam. Về ngoại hình, Asus Transformer Book T300 Chi nhìn chung chẳng mấy khác biệt với những mẫu laptop mỏng nhẹ đang có mặt trên thị trường. Tuy nhiên, điểm nhấn của sản phẩm chính là phần bàn phím có thể tháo rời nên người dùng có thể dùng Asus Transformer Book T300 Chi như một chiếc tablet màn hình lớn (12,5 inch).\r\n\r\nTuy trang bị màn hình 12,5 inch nhưng ngay cả khi xếp gọn như một chiếc laptop truyền thống, Asus Transformer Book T300 Chi vẫn trông khá mảnh mai nhờ thiết kế dạng vỏ sò (điểm dày nhất của thân máy cũng chỉ nhỉnh hơn 1,5cm). Một khi tháo rời khỏi phần thân máy khỏi bàn phím Bluetooth, chiếc tablet 12,5 inch Asus Transformer Book T300 Chi cũng chỉ dày khoảng 7,6mm.\r\n\r\nAsus,Asus T300 Chi,đánh giá laptop,laptop Asus,laptop lai,thiết bị 2-trong-1 thiết bị lai,Transformer Book T300 Chi,\r\nCó mặt tại Test Lab là mẫu Asus Transformer Book T300 Chi trang bị màn hình cảm ứng kích thước 12,5 inch góc rộng, độ phân giải Full HD (1.920 x 1.080 pixel), bộ xử lý 2 nhân Intel Core M-5Y71 xung nhịp 1,2GHz (Broadwell), đồ họa Intel HD Graphics 5300 tích hợp, RAM 8GB, ổ SSD 128GB, webcam HD 720p, khe cắm thẻ microSD, pin 32Whr và được cài đặt sẵn hệ điều hành Windows 8.1 Single Language bản 64-bit.\r\n\r\nAsus Transformer Book T300 Chi cũng trang bị kết nối không dây Wi-Fi 802.11 ac, Bluetooth 4.0 hỗ trợ xuất hình ảnh không dây WiDi. Các cổng giao tiếp mà Asus Transformer Book T300 Chi hỗ trợ bao gồm micro-USB 3.0, micro HDMI, jack cắm tai nghe 3,5mm, 2 loa công nghệ âm thanh Sonic Master, micro tích hợp.\r\n\r\nTrọn bộ sản phẩm ngoài tài liệu hướng dẫn đi kèm còn có cáp chuyển micro USB - USB 2.0, cáp microUSB-to-microUSB 2.0 và adaptor 19V DC - 1,75A.\r\n\r\nNgay từ lần “chạm mặt làm quen”, Asus Transformer Book T300 Chi đã tạo được ấn tượng tốt với Test Lab nhờ ngoại hình mảnh mai nhưng rất cứng cáp của thiết kế sử dụng vật liệu nhôm được gia công tỉ mỉ.\r\n\r\nAsus,Asus T300 Ch', '2015-06-10 06:17:31'),
(3, 'abc', NULL, '<p>abc</p>\r\n', '1998-03-12 00:00:00'),
(4, 'Laptop Lenovo G4030 80FY00DLVN 14inch (Đen)', NULL, '<p>Lenovo l&agrave; h&atilde;ng sản xuất laptop rất biết chiều l&ograve;ng kh&aacute;ch h&agrave;ng, sản phẩm của h&atilde;ng phong ph&uacute; về chủng loại đ&aacute;p ứng được nhu cầu sử dụng. Laptop 14 inch&nbsp;<strong>Lenovo G4030</strong>l&agrave; một đại diện cho d&ograve;ng laptop phổ th&ocirc;ng với mức gi&aacute; hấp dẫn b&ecirc;n cạnh cấu h&igrave;nh kh&aacute; ổn. Sản phẩm sở hữu vi xử l&yacute; Intel Celeron N2840 tốc độ 2.16GHz, RAM 2GB, ổ cứng 500GB, m&agrave;n h&igrave;nh 14&rdquo; HD sắc n&eacute;t, mang lại khả năng vận h&agrave;nh nhanh ch&oacute;ng b&ecirc;n cạnh thiết kế sang trọng, đẹp mắt.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>T&Iacute;NH NĂNG NỔI BẬT</strong></p>\r\n\r\n<p><strong>Thiết kế đơn giản, tinh tế</strong><br />\r\nChiếc laptop 14inch n&agrave;y sở hữu vẻ ngo&agrave;i đơn giản v&agrave; kh&ocirc;ng k&eacute;m phần tinh tế với c&aacute;c đường n&eacute;t mạnh mẽ ở bốn g&oacute;c m&aacute;y, chất liệu vỏ nhưạ cứng c&aacute;p v&agrave; trọng lượng chỉ hơn 2kg th&iacute;ch hợp cho việc di chuyển. C&aacute;c cổng kết nối tr&ecirc;n m&aacute;y cũng được bố tr&iacute; hợp l&yacute;, b&agrave;n ph&iacute;m với c&aacute;c ph&iacute;m c&oacute; độ đ&agrave;n hồi cao, &iacute;t b&aacute;m bụi v&agrave; tốc độ phản hồi tuyệt vời.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="Laptop Lenovo G4030" src="http://hcm.lazada.vn/static/content/Laptop/Lenovo-G4030-80FY006GVN-03.jpg" style="margin:0px" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>M&agrave;n h&igrave;nh 14 inch chuẩn HD</strong><br />\r\n<strong>Lenovo G4030</strong>&nbsp;được trang bị m&agrave;n h&igrave;nh k&iacute;ch thước 14 inch với độ ph&acirc;n giải 1366 x 768 pixels, tuy thuộc d&ograve;ng m&aacute;y phổ th&ocirc;ng nhưng m&agrave;n h&igrave;nh đạt chuẩn HD tương tự như c&aacute;c d&ograve;ng m&aacute;y tầm trung, nhờ đ&oacute; m&agrave; chất lượng hiển thị h&igrave;nh ảnh được đảm bảo kể cả khi bạn vận h&agrave;nh c&aacute;c chương tr&igrave;nh đồ họa nặng. C&ocirc;ng nghệ LED Backlight gi&uacute;p m&agrave;', '2015-06-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ykienkh`
--

CREATE TABLE IF NOT EXISTS `ykienkh` (
  `magopy` int(11) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `dienthoai` varchar(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `ngaythang` datetime NOT NULL,
  `tieude` varchar(500) NOT NULL,
  `noidung` varchar(5000) NOT NULL,
  PRIMARY KEY (`magopy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ctdondathang`
--
ALTER TABLE `ctdondathang`
  ADD CONSTRAINT `ctdondathang_ibfk_1` FOREIGN KEY (`madh`) REFERENCES `dondathang` (`madh`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ctdondathang_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON UPDATE CASCADE;

--
-- Constraints for table `dondathang`
--
ALTER TABLE `dondathang`
  ADD CONSTRAINT `dondathang_ibfk_1` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON UPDATE CASCADE;

--
-- Constraints for table `loaisp`
--
ALTER TABLE `loaisp`
  ADD CONSTRAINT `loaisp_ibfk_1` FOREIGN KEY (`manhom`) REFERENCES `nhomsp` (`manhom`) ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`mancc`) REFERENCES `nhacungcap` (`mancc`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_ibfk_5` FOREIGN KEY (`maloai`) REFERENCES `loaisp` (`maloai`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
