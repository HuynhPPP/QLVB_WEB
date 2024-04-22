-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 02:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `da1_qlvb`
--

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `id` int(11) NOT NULL,
  `tenkhoa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`id`, `tenkhoa`) VALUES
(1, 'Công nghệ thông tin'),
(2, 'Điện - Điện tử - Viễn thông'),
(3, 'Kỹ thuật cơ khí'),
(4, 'Kỹ thuật xây dựng'),
(5, 'Kinh tế - Quản lý công nghiệp'),
(6, 'Khoa Công sinh học - Công nghệ hoá học - Công nghệ thực phẩm'),
(7, 'Khoa học xã hội');

-- --------------------------------------------------------

--
-- Table structure for table `loaivanban`
--

CREATE TABLE `loaivanban` (
  `id` int(11) NOT NULL,
  `loaivanban` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaivanban`
--

INSERT INTO `loaivanban` (`id`, `loaivanban`) VALUES
(2, 'Tin tức'),
(3, 'Sự kiện'),
(4, 'Văn bản'),
(27, 'Văn phòng Đảng uỷ'),
(28, 'Phòng Khoa Học Công Nghệ ');

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `id` int(11) NOT NULL,
  `tenphong` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`id`, `tenphong`) VALUES
(1, 'Văn phòng Đảng uỷ'),
(2, 'Phòng đào tạo'),
(3, 'Phòng thanh tra và đảm bảo chất lượng'),
(4, 'Phòng công tác chính trị - QLSV'),
(5, 'Phòng quản lý khoa học - Hợp tác quốc tế'),
(6, 'Tổ chức - Hành chính'),
(7, 'Quản trị - Thiết bị'),
(8, 'Tài chính - Kế toán');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `taikhoan` varchar(16) NOT NULL,
  `matkhau` char(128) NOT NULL,
  `loaitaikhoan` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0.user, 1.admin',
  `mail` varchar(255) NOT NULL,
  `idkhoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `taikhoan`, `matkhau`, `loaitaikhoan`, `mail`, `idkhoa`) VALUES
(1, 'admin', '12345', 1, 'htkhuong2101499@student.ctuet.edu.vn', 1),
(2, 'khuong', '12345', 0, 'abc@gamil.com', 2),
(3, 'khang', '12345', 0, 'cba122@gmail.com', 3),
(4, 'tuan', '445566', 0, 'thg@gmail.com', 4),
(6, 'truong2', '12345', 0, 'tkd543@gmail.com', 6),
(24, 'admin89', '1234', 1, 'phanhuynh23223@gmail.com', 1),
(26, 'phan thanh', '12345', 0, 'phanhuynh23223@gmail.com', 4),
(27, 'phan thanh23', '1234', 1, 'huynhphan@gmail.com', 3),
(28, 'Nguyễn Văn HJK', '5555', 0, 'nhqhuy2100652@student.ctuet.edu.vn', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vanban`
--

CREATE TABLE `vanban` (
  `idvb` int(11) NOT NULL,
  `tieude` varchar(255) NOT NULL,
  `noidung` text NOT NULL,
  `loaivanban` int(11) NOT NULL,
  `idkhoa` int(11) NOT NULL DEFAULT 8,
  `ngaydang` date NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vanban`
--

INSERT INTO `vanban` (`idvb`, `tieude`, `noidung`, `loaivanban`, `idkhoa`, `ngaydang`, `file`) VALUES
(1, 'văn bản 1', 'Nội dung của văn bản 1', 2, 1, '2023-11-01', 'HuynhTanKhuong_2101499.doc'),
(3, 'công văn thành phố Cần Thơ', 'sdfsdf', 4, 3, '2023-11-16', 'Chuong3_Cacmohinhquanhe_Mohinhdulieuquanhe.pdf'),
(4, 'Quyết định sửa đổi Quy định về yểu cầu chuẩn kỹ năng công nghệ thông tin ', 'sfddddddddddddddddddđggggggggggggg', 4, 4, '2022-11-26', 'Chuong1.pdf'),
(5, 'ĐỀ CƯƠNG CHUYÊN ĐỀ CÔNG TÁC QUẢN LÝ VĂN BẢN', 'Công tác quản lý văn bản được quy định thực hiện thống nhất tại Nghị định số 110/2004/NĐ-CP ngày 08 tháng 4 năm 2004 của Chính phủ về công tác văn thư, Nghị định số 09/2010/NĐ-CP ngày 08 tháng 02 năm 2010 của Chính phủ sửa đổi, bổ sung một số điều của công tác văn thư và Thông tư số 07/2012/TT-BNV ngày 22 tháng 11 năm 2012 của Bộ Nội vụ hướng dẫn quản lý văn bản, lập hồ sơ và nộp hồ sơ, tài liệu vào Lưu trữ cơ quan. Thông tư này có hiệu lực thi hành kể từ ngày 07 tháng 01 năm 2013.\r\n', 3, 5, '2023-10-18', 'tkegthuat.docx'),
(6, 'ĐỀ NGHỊ CÁC CƠ QUAN, TỔ CHỨC BÁO CÁO TỔNG KẾT ', 'Ngày 31 tháng 3 năm 2020, Chi cục Văn thư - Lưu trữ ban hành Công văn số 58/CCVTLT-QL gửi các cơ quan, tổ chức đề nghị báo cáo tổng kết thực hiện Luật Lưu trữ.\r\n\r\nCông văn có nội dung chủ yếu:\r\n\r\nThực hiện Công văn số 1515/BNV-VTLTNN ngày 25 tháng 3 năm 2020 của Bộ Nội vụ về việc hướng dẫn báo cáo tổng kết thực hiện Luật Lưu trữ;\r\n\r\nĐể có cơ sở tổng hợp, tham mưu Giám đốc Sở Nội vụ trình Ủy ban nhân dân Thành phố báo cáo tổng kết và đề xuất sửa đổi, bổ sung một số điều của Luật Lưu trữ, Chi cục Văn thư - Lưu trữ đề nghị các cơ quan, tổ chức báo cáo tổng kết thực hiện Luật Lưu trữ theo Đề cương đính kèm (số liệu báo cáo tính từ thời điểm Luật Lưu trữ có hiệu lực đến ngày 31 tháng 12 năm 2019).\r\n\r\nBáo cáo gửi về Chi cục Văn thư - Lưu trữ trước ngày 10 tháng 4 năm 2020, địa chỉ: tầng 6, Tòa nhà IPC, số 1489 Nguyễn Văn Linh, phường Tân Phong, Quận 7; Hệ thống quản lý văn bản của chính quyền điện tử Thành phố hoặc Email: ccvtlt.snv@tphcm.gov.vn', 2, 6, '2023-12-21', 'Bieudo.docx'),
(7, 'KẾ HOẠCH KIỂM TRA CÔNG TÁC VĂN THƯ, LƯU TRỮ NĂM 2020', 'I. MỤC ĐÍCH, YÊU CẦU\r\n\r\n1. Nhằm tổng hợp, đánh giá tình hình thực hiện Luật Lưu trữ và các quy định của Nhà nước về công tác VTLT tại các cơ quan, tổ chức.\r\n\r\n2. Công tác kiểm tra giúp phát hiện và kịp thời chấn chỉnh, hướng dẫn bổ sung các điểm còn thiếu sót, chưa phù hợp với quy định trong công tác VTLT tại các cơ quan, tổ chức; từng bước nâng cao nghiệp vụ công tác VTLT, nhất là công tác lập hồ sơ, chỉnh lý, số hóa và giao nộp hồ sơ vào Lưu trữ cơ quan, Lưu trữ lịch sử; công tác quản lý tài liệu lưu trữ điện tử.\r\n\r\n3. Kết quả kiểm tra tình hình thực tế hoạt động VTLT của lĩnh vực giáo dục, y tế để có giải pháp hướng dẫn thực hiện thống nhất.\r\n\r\n4. Thông qua kết quả kiểm tra là cơ sở thực tế để tham mưu, đề xuất các phương án, đề án, nhằm phát triển ngành VTLT Thành phố.', 2, 7, '2023-11-01', 'tkegthuat.docx'),
(8, 'văn bản 5', 'ggggggggggggggggggggg', 3, 1, '2023-11-11', 'Baitap_Future_Continuous_Tense.docx'),
(9, 'văn bản 6', 'hhhhhhhhhhhhhhhhhhhhhhhh', 4, 2, '2023-11-16', 'Baitap_Past_Continuous_Tense.docx'),
(10, 'văn bản 7', 'ttttttttttttttttttttttttttttttttt', 2, 3, '2023-11-05', 'Baitap_Present_Perfect.docx'),
(11, 'văn bản 8', 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 4, 4, '2023-11-08', 'Baitap_Present_Perfect.docx'),
(12, 'văn bản 9', 'llllllllllllllllllllllllllllllllllllllwwwwwwwwwwwwwwwwwwwwwwwwww', 3, 5, '2023-11-01', 'BaiTap_Simple_Past.rtf'),
(14, 'văn bản 11', 'qưeqwewqeqw', 2, 7, '2023-11-09', 'Baitap_Present_Continuous.docx'),
(15, 'văn bản 13', 'àddcxz', 4, 1, '2023-11-03', 'BaiTap_Present_Simple.rtf'),
(18, 'văn bản 20', 'ádsweeeeeeeeeeeeeeeeeeeeeeeeeeee', 4, 4, '2023-11-09', 'Baitap_Future_Continuous_Tense.docx'),
(20, 'văn bản 26', 'vbnvbncvnvnfghfgbc', 2, 6, '2023-11-21', 'Baitap_Present_Continuous.docx'),
(22, 'văn bản 20', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 3, 6, '2023-11-15', 'QHK_2101344-HTK_2101499.docx'),
(64, 'Văn bản số 30', 'Nội dung mẫu được ghi vào đây.', 2, 4, '2024-04-18', '[123doc] - tim-hieu-va-trien-khai-cac-dich-vu-mang'),
(66, 'Văn bản số 30', 'nội dung mẫu', 2, 5, '2024-04-18', 'taisachmoicom-tim-hieu-va-trien-khai-quan-tri-mang'),
(67, 'dđ', 'dssss', 2, 3, '2024-04-21', 'DoAn2.docx'),
(70, 'hjhhj', 'asa', 2, 2, '2024-04-21', 'Mayhoc.docx');

-- --------------------------------------------------------

--
-- Table structure for table `vanban_chung`
--

CREATE TABLE `vanban_chung` (
  `idvb_chung` int(11) NOT NULL,
  `tenvanban` varchar(255) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `id_loaivanban` int(11) NOT NULL,
  `idphong` int(11) NOT NULL,
  `ngaydang` date NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vanban_chung`
--

INSERT INTO `vanban_chung` (`idvb_chung`, `tenvanban`, `noidung`, `id_loaivanban`, `idphong`, `ngaydang`, `file`) VALUES
(1, 'CẢ NƯỚC ĐỒNG LÒNG‚ TRANH THỦ MỌI THỜI CƠ‚ VƯỢT QUA MỌI KHÓ KHĂN‚ THÁCH THỨC', 'Lễ ra mắt cuốn sách “Cả nước đồng lòng, tranh thủ mọi thời cơ, vượt qua mọi khó khăn, thách thức, quyết tâm thực hiện thắng lợi Nghị quyết Đại hội XIII của Đảng” của đồng chí Tổng Bí thư Nguyễn Phú Trọng.', 2, 1, '2023-11-08', ''),
(2, 'HOẠT ĐỘNG KỶ NIỆM CẦN HƯỚNG TỚI NÂNG CAO ĐỜI SỐNG NHÂN DÂN\r\n', 'Đồng chí Trương Thị Mai, Uỷ viên Bộ Chính trị, Thường trực Ban Bí thư, Trưởng ban Tổ chức Trung ương, Trưởng ban chỉ đạo chủ trì cuộc họp Ban Chỉ đạo Trung ương kỷ niệm các ngày Lễ lớn và sự kiện lịch sử quan trọng của đất nước trong 3 năm (2023 – 2025).', 3, 1, '2023-11-15', ''),
(3, 'DIỄN ĐÀN VÀNH ĐAI VÀ CON ĐƯỜNG: NHIỀU CƠ HỘI HỢP TÁC MỚI CHO VIỆT NAM', 'Trong đó sự coi trọng và ưu tiên hàng đầu của hai nước là việc phát triển quan hệ song phương, cũng như thể hiện sự hoan nghênh, coi trọng đối với Sáng kiến “Vành đai và Con đường” vì mục tiêu hòa bình, ổn định và phồn vinh tại khu vực và trên thế giới. C', 4, 1, '2023-11-20', ''),
(4, 'KHƠI DẬY KHÁT VỌNG CỐNG HIẾN‚ TINH THẦN ĐỔI MỚI‚ SÁNG TẠO Ở CÁN BỘ', 'Sợ sai, không dám làm, đó là tình trạng đã và đang diễn ra trong một bộ phận cán bộ, công chức, viên chức. Để tạo cơ sở pháp lý cho cán bộ dám nghĩ, dám làm, mới đây, Chính phủ đã ban hành Nghị định số 73/2023/NĐ-CP.', 2, 1, '2023-11-15', ''),
(5, 'BCH ĐẢNG BỘ KHỐI CƠ QUAN DCĐ THÀNH PHỐ TỔ CHỨC HỘI NGHỊ LẦN THỨ 15‚ KHÓA VIII', 'Đến dự có đồng chí Lê Tấn Thủ, Ủy viên Ban Thường vụ Thành ủy, Trưởng Ban Tổ chức Thành ủy; đồng chí Nguyễn Minh Tâm, Thành ủy viên, Bí thư Đảng ủy Khối; đồng chí Hồ Truyền Thống, Phó Bí thư Thường trực Đảng ủy Khối và toàn thể các đồng chí Ủy viên Ban Ch', 3, 1, '2023-11-14', ''),
(6, 'Thông báo về việc đóng học phí HK1 (2023-2024)', '', 2, 2, '2023-07-27', '635_TB_ĐHKTCN_thongbao_Vvnophochocky_I_namhoc_2023-2024 (1).pdf'),
(7, 'Thông báo thu học phí môn Giáo dục Quốc phòng và An ninh năm học 2022 - 2023', '', 2, 2, '2023-05-22', '430_TB_ĐHKTCN_Thông báo thu học phí_GiaoducQuocphong_anninh.pdf'),
(8, 'Thông báo về việc đóng học phí HK1 (2022-2023)', '', 2, 2, '2023-08-22', '715_TB_ĐHKTCN_Thongbao_nophocphi_hocky_I_namhoc_2022-2023.pdf'),
(9, 'Thông báo về việc tổ chức Lễ trao bằng tốt nghiệp sinh viên đại học chính quy đợt tháng 9 năm 2023', '', 3, 2, '2023-10-08', '873 tb trao bang tn dot thang 9 nam 2023.pdf'),
(10, 'Tân sinh viên khoá 2023', '', 4, 2, '2023-08-27', 'Tân sinh viên khoá 2023.pdf'),
(11, 'BẾ MẠC ĐỢT KHẢO SÁT CHÍNH THỨC ĐÁNH GIÁ NGOÀI 05 CHƯƠNG TRÌNH ĐÀO TẠO TRÌNH ĐỘ ĐẠI HỌC', 'Đợt khảo sát chính thức kiểm định chất lượng 05 chương trình đào tạo trình độ đại học (Hệ thống thông tin; ngành Công nghệ kỹ thuật điện, điện tử; ngành Quản lý công nghiệp; ngành Công nghệ kỹ thuật điều khiển và tự động hóa; ngành Công nghệ kỹ thuật công', 2, 3, '2023-05-16', ''),
(12, 'KHAI MẠC ĐỢT KHẢO SÁT CHÍNH THỨC ĐÁNH GIÁ NGOÀI 05 CHƯƠNG TRÌNH ĐÀO TẠO TRÌNH ĐỘ ĐẠI HỌC', 'Ngày 05/5/2023, Trung tâm Kiểm định chất lượng giáo dục – Đại học Đà Nẵng đã khai mạc đợt khảo sát chính thức phục vụ đánh giá ngoài 05 chương trình đào tạo trình độ đại học của các ngành: Hệ thống thông tin, Quản lý công nghiệp, Công nghệ kỹ thuật điện,\r', 3, 3, '2023-11-08', ''),
(13, 'HỘI NGHỊ CÔNG TÁC BẢO ĐẢM CHẤT LƯỢNG GIÁO DỤC CỦA TRƯỜNG ĐẠI HỌC KỸ THUẬT – CÔNG NGHỆ CẦN THƠ LẦN 2 NĂM HỌC 2021-2022', 'Hội nghị có sự tham dự của TS Trương Minh Nhật Quang, Phó Hiệu trưởng, Phó Chủ tịch Hội đồng Bảo đảm chất lượng giáo dục (BĐCLGD); Lãnh đạo các đơn vị; các thành viên Hội đồng BĐCLGD và các thành viên Tổ BĐCLGD của các đơn vị.\r\n\r\nTại Hội nghị, đại diện lã', 4, 3, '2023-11-17', ''),
(14, 'HỘI NGHỊ CÔNG TÁC BẢO ĐẢM CHẤT LƯỢNG GIÁO DỤC CỦA TRƯỜNG ĐẠI HỌC KỸ THUẬT – CÔNG NGHỆ CẦN THƠ LẦN 01 NĂM 2022\r\n', 'Ngày 20/01/2022, Trường Đại học Kỹ thuật – Công nghệ Cần Thơ tổ chức Hội nghị Công tác bảo đảm chất lượng giáo dục lần 01 năm 2022.\r\n\r\nHội nghị có sự tham dự của NGND.PGS.TS Huỳnh Thanh Nhã, Bí thư Đảng ủy, Hiệu trưởng, Chủ tịch Hội đồng BĐCLGD, Ban Giám ', 2, 3, '2023-11-18', ''),
(15, 'KHAI MẠC ĐỢT KHẢO SÁT CHÍNH THỨC PHỤC VỤ ĐÁNH GIÁ NGOÀI TRƯỜNG ĐẠI HỌC KỸ THUẬT – CÔNG NGHỆ CẦN THƠ', 'Sáng ngày 05/10/2020, Trường Đại học Kỹ thuật – Công nghệ Cần Thơ phối hợp với Trung tâm Kiểm định chất lượng giáo dục – Đại học Đà Nẵng tổ chức phiên khai mạc đợt khảo sát chính thức phục vụ đánh giá ngoài Trường Đại học Kỹ thuật – Công nghệ Cần Thơ theo', 3, 3, '2023-11-19', ''),
(16, 'văn bản 20', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, yo', 3, 4, '2023-11-02', ''),
(17, 'văn bản 21', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, yo', 2, 4, '2023-11-08', ''),
(18, 'văn bản 22', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, yo', 4, 4, '2023-11-01', ''),
(19, 'văn bản 24', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, yo', 4, 4, '2023-11-02', ''),
(20, 'văn bản 23', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, yo', 3, 4, '2023-11-08', ''),
(21, 'văn bản 30', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, co', 3, 5, '2023-11-01', ''),
(22, 'văn bản 31', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, co', 2, 5, '2023-11-08', ''),
(23, 'văn bản 32', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, co', 4, 5, '2023-11-09', ''),
(24, 'văn bản 33', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, co', 3, 5, '2023-11-08', ''),
(25, 'văn bản 34', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, co', 4, 5, '2023-11-15', ''),
(26, 'văn bản 40', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions ', 3, 6, '2023-11-01', ''),
(27, 'văn bản 41', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions ', 2, 6, '2023-11-10', ''),
(28, 'văn bản 42', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions ', 4, 6, '2023-10-03', ''),
(29, 'văn bản 43', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from de Finibus Bonorum et Malorum by Cicero are also reproduced in their exact original form, accompanied by English versions fr', 3, 6, '2023-11-01', ''),
(30, 'văn bản 44', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions ', 4, 6, '2023-11-01', ''),
(31, 'văn bản 50', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 3, 7, '2023-11-01', ''),
(32, 'văn bản 51', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 2, 7, '2023-11-15', ''),
(33, 'văn bản 52', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 4, 7, '2023-11-15', ''),
(34, 'văn bản 53', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 2, 7, '2023-11-08', ''),
(35, 'văn bản 54', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 4, 7, '2023-11-15', ''),
(36, 'văn bản 60', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 3, 8, '2023-11-08', ''),
(37, 'văn bản 61', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 2, 8, '2023-11-15', ''),
(38, 'văn bản 62', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 4, 8, '2023-11-15', ''),
(51, 'HỒ CHÍ MINH LỰA CHỌN CON ĐƯỜNG PHÁT TRIỂN CỦA DT VIỆT NAM QUA TÁC PHẨM THƯỜNG THỨC CHÍNH TRỊ', 'Đó là lý tưởng, lẽ sống được Người khẳng định trong các cương lĩnh, đường lối của Đảng và nhiều bài nói, bài viết, trong đó có tác phẩm “Thường thức chính trị”. Đó cũng là con đường phát triển, là mục tiêu, là bước đi của cách mạng Việt Nam trong thời đại', 4, 1, '2023-11-17', 'Bieudo.docx'),
(52, 'VẬN DỤNG TƯ TƯỞNG HỒ CHÍ MINH VỀ KHUYẾN HỌC‚ KHUYẾN TÀI TRONG XÂY DỰNG XH HỌC TẬP Ở VN', 'Tư tưởng của Người đã được Đảng ta kế thừa và phát triển khi đưa ra chủ trương khuyến học, khuyến tài và xây dựng xã hội học tập để nâng cao dân trí, phát triển nhân lực ở Việt Nam hiện nay.', 3, 1, '2023-11-03', 'Bieudo.docx'),
(53, 'GS.VS TRẦN ĐẠI NGHĨA: NHÀ KHOA HỌC TÀI BA‚ VỊ TƯỚNG KHIÊM NHƯỜNG‚ GIẢN DỊ', 'Giáo sư, viện sĩ, anh hùng lao động Trần Đại Nghĩa (1913-1997) người có công lớn trong việc gây dựng nền quân giới, chế tạo vũ khí, góp phần đặc biệt quan trọng vào thành công của cuộc kháng chiến chống thực dân, đế quốc.', 2, 1, '2023-11-03', 'Bieudo.docx'),
(54, 'TUYÊN NGÔN ĐỘC LẬP - KẾT TINH VÀ TỎA SÁNG NHỮNG GIÁ TRỊ VĂN HÓA TIÊU BIỂU CỦA DÂN TỘC VIỆT NAM', 'Tuyên ngôn độc lập - Kết tinh và tỏa sáng những giá trị văn hóa tiêu biểu của dân tộc Việt Naml, là áng văn lập quốc vĩ đại, là văn kiện có giá trị cao về tư tưởng, lý luận của Chủ tịch Hồ Chí Minh. ', 4, 1, '2023-11-02', 'Bieudo.docx'),
(55, 'ĐẤU TRANH‚ PHẢN BÁC CÁC LUẬN ĐIỆU XUYÊN TẠC VỀ VAI TRÒ CỦA CÔNG TÁC CHÍNH TRỊ TRONG QĐNDVN', 'Với âm mưu đòi “phi chính trị hóa” quân đội, các thế lực chống đối, thù địch vẫn không ngừng sử dụng các thủ đoạn, chiêu trò để xuyên tạc, chống phá, nhất là về vai trò của công tác chính trị trong quân đội nhân dân Việt Nam.', 2, 1, '2023-11-09', 'CV_4427_0001.signed.pdf'),
(56, 'SỨC MẠNH ĐẠI ĐOÀN KẾT TOÀN DÂN TỘC TRONG SỰ NGHIỆP XÂY DỰNG VÀ BẢO VỆ TỔ QUỐC VNXHCN', 'Cần tiếp tục phát huy sức mạnh đại đoàn kết toàn dân tộc với ý chí, nghị lực và sức sáng tạo của con người Việt Nam trên tất cả các lĩnh vực của đời sống xã hội để thực hiện mục tiêu “Dân giàu, nước mạnh, dân chủ, công bằng và văn minh”,', 3, 1, '2023-11-09', 'HuynhTanKhuong_2101499.doc'),
(57, 'QĐNDVN‚ LỰC LƯỢNG TIÊN PHONG‚ ĐI ĐẦU TRONG BẢO VỆ NỀN TẢNG TƯ TƯỞNG CỦA ĐẢNG', 'Hiện nay, trước sự chống phá của các thế lực thù địch với thủ đoạn “phi chính trị hóa” Quân đội, việc bảo vệ nền tảng tư tưởng của Đảng trong Quân đội là yêu cầu cấp thiết và là nhiệm vụ quan trọng hàng đầu, góp phần xây dựng Quân đội nhân dân Việt Nam vữ', 3, 1, '2023-11-02', 'HuynhTanKhuong_2101499.doc'),
(58, 'văn bản 90', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 2, 2, '2023-11-17', 'HuynhTanKhuong_2101499.doc'),
(59, 'văn bản 91', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 3, 2, '2023-11-16', 'HuynhTanKhuong_2101499.doc'),
(60, 'văn bản 92', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 4, 2, '2023-11-03', 'HuynhTanKhuong_2101499.doc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loaivanban`
--
ALTER TABLE `loaivanban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `lk_khoa` (`idkhoa`);

--
-- Indexes for table `vanban`
--
ALTER TABLE `vanban`
  ADD PRIMARY KEY (`idvb`),
  ADD KEY `lk_loaivanban` (`loaivanban`),
  ADD KEY `lk_khoa_vanban` (`idkhoa`);

--
-- Indexes for table `vanban_chung`
--
ALTER TABLE `vanban_chung`
  ADD PRIMARY KEY (`idvb_chung`),
  ADD KEY `lk_loaivanban` (`id_loaivanban`),
  ADD KEY `lk_phong` (`idphong`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `loaivanban`
--
ALTER TABLE `loaivanban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `phong`
--
ALTER TABLE `phong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `vanban`
--
ALTER TABLE `vanban`
  MODIFY `idvb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `vanban_chung`
--
ALTER TABLE `vanban_chung`
  MODIFY `idvb_chung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `lk_khoa` FOREIGN KEY (`idkhoa`) REFERENCES `khoa` (`id`);

--
-- Constraints for table `vanban`
--
ALTER TABLE `vanban`
  ADD CONSTRAINT `li_loaivanban` FOREIGN KEY (`loaivanban`) REFERENCES `loaivanban` (`id`),
  ADD CONSTRAINT `lk_khoa_vanban` FOREIGN KEY (`idkhoa`) REFERENCES `khoa` (`id`);

--
-- Constraints for table `vanban_chung`
--
ALTER TABLE `vanban_chung`
  ADD CONSTRAINT `lk_loaivanban` FOREIGN KEY (`id_loaivanban`) REFERENCES `loaivanban` (`id`),
  ADD CONSTRAINT `lk_phong` FOREIGN KEY (`idphong`) REFERENCES `phong` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
