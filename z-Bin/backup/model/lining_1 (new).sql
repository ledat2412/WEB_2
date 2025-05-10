-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 07, 2025 lúc 11:10 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lining_1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `addresses`
--

CREATE TABLE `addresses` (
  `id_address` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `recive_name` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `addresses`
--

INSERT INTO `addresses` (`id_address`, `id_user`, `recive_name`, `phone`, `address`) VALUES
(15, 1, 'Lê Nguyễn Đức Đạt', '0335205100', '123123123123123123123123123123123'),
(19, 1, 'Skibidiyetyet', '12345678910', 'tung tung tung tung sahur'),
(24, 1, 'Lê Đạt', '0335205100', '756/54'),
(25, 1, 'sick my duck', '123987596', 'go to ur place and kick ass'),
(28, 1, 'Lê Nguyễn Đức Đạt', '0335205100', '02 Bến Vân Đồn, Phường 13, Quận 4, Thành phố Hồ Chí Minh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `id_product`, `quantity`) VALUES
(5, 1, 7, 3),
(7, 1, 4, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colors`
--

CREATE TABLE `colors` (
  `id_color` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `colors`
--

INSERT INTO `colors` (`id_color`, `name`) VALUES
(1, 'black'),
(5, 'blue'),
(3, 'Multi color'),
(4, 'Neon Melon Orange'),
(2, 'Standard White'),
(6, 'yellow');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `descriptions`
--

CREATE TABLE `descriptions` (
  `id_description` int(10) UNSIGNED NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `descriptions`
--

INSERT INTO `descriptions` (`id_description`, `content`) VALUES
(1, 'Công nghệ\nCông nghệ LI-NING BOOM là vật liệu đế giữa kiểu mới do Li-Ning tự khai thác phát triển, được điều chế bằng quy trình tạo bọt lỏng siêu giới hạn, so với chất liệu truyền thống thì chất liệu này giảm được đáng kể trọng lượng đế giữa, không chỉ giúp tính năng đàn hồi được phát huy rõ rệt, mà còn kéo dài được tuổi thọ sử dụng, tăng cường thêm tính năng của sản phẩm. Thông qua các điều chỉnh sát với mục tiêu tính năng và chi tiết hơn, để phù với tính chất cạnh tranh của các môn thể thao khác nhau như chạy, bóng rổ, cầu lông, bóng bàn, v.v….nâng cao hiệu suất tốt cho các vận động viên với các mục mục đích sử dụng khác nhau.\nTUFF RB là loại vật liệu cao su có khả năng chống mài mòn cao, giúp cải thiện khả năng chống mài mòn của vật liệu cao su gấp 2.5 lần so với vật liệu cao su thông thường. Cải thiện đáng kể khả năng chống mài mòn của đế và kéo dài tuổi thọ của giày\nHEEL LOC là một thiết bị hỗ trợ và ổn định xung quanh gót giày để hỗ trợ người mang không bị mất thăng bằng trong quá trình tập luyện và di chuyển trên mọi địa hình\nThân giày\nBề mặt giầy với thiết kế sáng tạo, phối màu đơn giản mà linh hoạt, đặc biệt mix giữa chất liệu vải dệt và da đem đến điểm nhấn cho đôi giày.Tính chất ôm sát nâng đỡ, mỏng nhẹ thoáng khí giúp cho bàn chân cảm giác như được thở theo nhịp chuyển động, mỗi bước chân trở nên linh hoạt chuẩn xác.\nPhần Đế Giữa:\nSử dụng chất liệu mới BOOM - là một bước đột phá trong khai thác phát triển công nghệ giầy của thương hiệu LiNing\nCông nghệ LI-NING BOOM là vật liệu đế giữa kiểu mới do Li-Ning tự khai thác phát triển, được điều chế bằng quy trình tạo bọt lỏng siêu giới hạn, so với chất liệu truyền thống thì chất liệu này giảm được đáng kể trọng lượng đế giữa, không chỉ giúp tính năng đàn hồi được phát huy rõ rệt, mà còn kéo dài được tuổi thọ sử dụng, tăng cường thêm tính năng của sản phẩm. Tăng cường lực đàn hồi 8.4%\nPhần Đế Ngoài:\nĐế giày với công nghệ TUFF RB là vật liệu cao su có khả năng chống mài mòn cao, tốt hơn các vật liệu cao su thông thường và có thể cải thiện hiệu quả khả năng chống mài mòn của đế, do đó kéo dài tuổi thọ của giày. Tỉ lệ chống nước chống trơn trượt nâng cao. Tăng cường tính ổn định, tăng cường sự tự tin.\nPhần Gót giày:\nSử dụng công nghệ HEEL LOC là một thiết bị hỗ trợ và ổn định xung quanh gót giày để hỗ trợ người mang không bị mất thăng bằng trong quá trình tập luyện và di chuyển trên mọi địa hình'),
(2, 'Công nghệ\r\nSử dụng cấu trúc đôi lớp ở giữa đế giữa, lớp trên sử dụng công nghệ Lining Arc, mang lại trải nghiệm nhẹ, giảm chấn và đàn hồi tuyệt vời cho người chạy; lớp dưới của phần gót chân được nâng cấp bằng vật liệu Lightfoam Ultra, so với Lightfoam Plus, vật liệu này nhẹ hơn, có đàn hồi và độ bền chống mỏi cơ tốt hơn.So với thế hệ trước, giữa đế dày hơn, nhẹ hơn, với độ chênh lệch 6mm phù hợp cho chạy dài và huấn luyện tốc độ, giúp người chạy tập luyện nhiều cơ bắp chân hơn\r\nPROBAR LOC là một thiết bị ổn định được gắn vào vòm của đế giữa và được kết nối với bàn chân trước và gót chân, có thể giúp vòm bàn chân được hỗ trợ và bảo vệ đúng cách trong mỗi bước tập luyện, đồng thời cải thiện độ ổn định.\r\nLINING BOOM:Công nghệ Flick của Li-Ning là một vật liệu đế giữa cải tiến được phát triển độc lập bởi Li Ning. Nó được điều chế thông qua quy trình tạo bọt chất lỏng siêu tới hạn. So với các vật liệu truyền thống, nó làm giảm đáng kể trọng lượng của đế giữa và cải thiện đáng kể hiệu suất bật lại của nó .Nó có tuổi thọ dài hơn và cải thiện đáng kể chức năng của sản phẩm. Đồng thời, thông qua các điều chỉnh có mục tiêu hơn, nó có thể thích ứng với nhu cầu cạnh tranh của các môn thể thao khác nhau như chạy, bóng rổ, cầu lông, bóng bàn, v.v. và hỗ trợ hiệu suất tốt cho các vận động viên ở các môn thể thao khác nhau.\r\n'),
(3, 'Công nghệ\r\nFEIDIAN 3 CHALLENGER là sản phẩm giày chạy chuyên nghiệp với phần đế giữa sử dụng công nghệ LN Boom, tính năng đàn hồi phản lực tốt mang lại trải nghiệm giảm chấn đàn hồi tuyệt vời cho người chạy bộ . Với bề mặt được làm từ chất liệu vải êm ái và mềm mại, sản phẩm mang lại cảm giác thoải mái và êm ái cho người dùng.Sản phẩm cũng được thiết kế với bảo vệ ngón chân, giảm thiểu nguy cơ bị đau đớn hoặc chấn thương trong quá trình tập luyện.Với thiết kế chắc chắn và tỉ mỉ, kết hợp công nghệ, sản phẩm giày FEIDIAN 3 CHALLENGER sẽ là một sự lựa chọn tuyệt vời cho những ai đang tìm kiếm một đôi giày chạy bộ vừa đẹp vừa chất lượng.\r\nCông nghệ đột phá:\r\nĐế carbon với các sợi cường độ cao mang đến cảm giác đẩy mạnh mẽ. Hiệu quả đẩy và giãn tăng 10%\r\nĐộ đàn hồi siêu cao: Đế giữa toàn bộ đêm dày\r\nTản nhiệt cực nhanh: Công nghệ mặt giày bằng sợi tơ tằm, mật độ không quá cao, tăng khả năng thông gió lên đến 35%\r\nCông nghệ Li-Ning Boom:LI-NING BOOM là loại chất liệu đế giữa mang tính cách mạng được chính Li-ning nghiên cứu và phát triển. Được tạo thành thông qua quy trình tạo bọt chất lỏng siêu giới hạn, so với chất liệu truyền thống nó nhẹ hơn, giúp giảm đáng kể trong lượng đế giữa, độ đàn hồi tốt hơn, tuổi thọ cao hơn, giúp nâng cao tính năng sản phẩm. Đồng thời, thông qua những cải tiến mang tính mục tiêu có thể thích ứng nhu cầu cạnh tranh các môn thể thao khác như chạy bộ, bóng rổ, cầu lông, bóng bàn.... Hỗ trợ tốt nhất cho các vận động viên trong mỗi hạng mục thể thao.\r\nCarbon – Fiber plate là sản phẩm được làm từ sợi carbon có khả năng chịu lực vượt trội và nhẹ hơn so với các loại TPU truyền thống. Đây là vật liệu có tính năng đàn hồi, khả năng chịu va đập và chống sốc tốt.Sản phẩm Carbon – Fiber plate giúp hỗ trợ và tăng cường sự ổn định cho đôi chân khi tham gia các hoạt động thể thao, giúp giảm thiểu thiệt hại cho các cơ bắp và xương của người dùng trong quá trình tập luyện và cải thiện hiệu suất thể thao của người sử dụng.Đặc điểm ưu việt của sản phẩm Carbon – Fiber plate sẽ giúp người dùng có trải nghiệm tuyệt vời trong quá trình tập luyện và thi đấu.\r\nGCR (Groud Control Rubber) là một loại cao su chống trượt nhẹ mới, được điều chỉnh công thức và quy trình sản xuất để mật độ của nó thấp hơn so với cao su thông thường và nhỏ hơn mật độ của nước, vì vậy nó có thể nổi trên mặt nước.Đồng thời, hiệu suất chống trượt ướt của GCR được cải thiện đáng kể so với cao su thông thường, mang lại trải nghiệm mặc thoái mái và an toàn hơn cho người sử dụng\r\nBoom Fiber là một loại chất liệu cao su nhiệt dẻo mới, được sản xuất thông qua công nghệ cắt sợi tiên tiến, tạo ra các sợi BOOM mới. BOOM FIBER có độ bền cao, đàn hồi tốt hơn so với các loại sợi thông thường và mang lại cảm giác thoải mái cho người sử dụng.Kết hợp với công nghệ dệt tiên tiến, BOOM FIBER tạo nên các mẫu vải đan chắc chắn, nhẹ và thoáng khí cho các loại giày. Nhờ tính năng này, giày được sản xuất từ BOOM FIBER không bị biến dạng và có tuổi thọ cao hơn.Sử dụng BOOM FIBER để sản xuất giày mang lại cảm giác thoải mái và bền bỉ trong quá trình sử dụng\r\n'),
(4, 'Công nghệ\r\nCấu trúc đế giữa 2 lớp trên và dưới, lớp trên sử dụng công nghệ LI-NING BOOM, mang đến trải nghiệm nhẹ, êm ái, đàn hồi cho người chạy; lớp dưới với chất liệu LIGHT FOAM ULTRA, nhẹ hơn, đàn hồi hơn, khả năng chống mỏi tuyệt vời hơn so với chất liệu EVA truyền thống. Kết cấu nâng cấp cấu trúc của cả đế giữa giúp duy trì sự cân cân bằng biến dạng động, thuận lợi hơn cho việc truyền lực từ gót chân lên bàn chân trước\r\nPhần bàn chân trước dày dặn hơn, trải nghiệm tuyệt vời ngay từ bước đầu tiên, nâng tầm trải nghiệm cho việc chạy bộ thêm êm ái và đàn hồi, vị trí phần vểnh lên ở mũi giày được điều chỉnh mang đến cảm giác lăn đều như bánh xe trong quá trình chạy, nâng tầm trải nghiệm cho việc chạy bộ thoải mái hơn, đạt hiệu quả cao hơn.Chất liệu sợi MONO cho phần upper nhẹ, thoáng khí\r\nĐế ngoài sử dụng cao su chống trượt GCR, trọng lượng nhẹ, cải thiện độ chống trơn trượt mọi mặt, hiệu suất chống trượt cao hơn 25% so với đế cao su thông thường,\r\nLIGHT FOAM ULTRA thông qua việc bổ sung nhiều loại chất đàn hồi nhiệt dẻo có đặc tính ưu việt và kết hợp chúng với kỹ thuật biến tính chất liệu đặc biệt khiến chất liệu đế giữa được trộn đều hơn, cấu trúc tế bào chặt chẽ hơn. Đế giữa được làm bằng phương pháp này nhẹ hơn, có độ đàn hồi tốt hơn và đế ít bị biến dạng hơn, cung cấp đủ động năng lưu trữ cho vận động thể thao\r\nPROBAR LOC là bộ phận nhựa nhiệt dẻo được gắn vào phần vòm nối liền bàn chân trước và gót chân, có tính năng hỗ trợ vòm bàn chân trong quá trình vận động, trợ lực tốt nhất cho vòm bàn chân trong mỗi bước tập luyện, đồng thời cũng giảm gánh nặng cho vòm bàn chân.\r\nLI-NING BOOM là loại chất liệu đế giữa mang tính cách mạng được chính Li-ning nghiên cứu và phát triển. Được tạo thành thông qua quy trình tạo bọt chất lỏng siêu giới hạn, so với chất liệu truyền thống nó nhẹ hơn, giúp giảm đáng kể trong lượng đế giữa, độ đàn hồi tốt hơn, tuổi thọ cao hơn, giúp nâng cao tính năng sản phẩm. Đồng thời, thông qua những cải tiến mang tính mục tiêu có thể thích ứng nhu cầu cạnh tranh các môn thể thao khác như chạy bộ, bóng rổ, cầu lông, bóng bàn.... Hỗ trợ tốt nhất cho các vận động viên trong mỗi hạng mục thể thao.\r\n'),
(5, 'Lưu ý: Do vận chuyển, sản phẩm có thể bị lỗi nhẹ, vỏ hộp có thể bị móp méo. Đặc biệt, quý khách vui lòng xem chính xác kích thước và cân nhắc kỹ trước khi đặt hàng,. Vstyle không hỗ trợ thử và đổi size sau khi quý khách nhận hàng thành công.\r\n\r\n\r\nChất liệu : Textile+TPU\r\n\r\nCông nghệ : Lining Boom+ Tuff RB + Dual loc + Heel loc\r\n\r\nDòng sản phẩm : Running/ Chạy bộ\r\n\r\nCông nghệ LI-NING BOOM là vật liệu đế giữa kiểu mới do Li-Ning tự khai thác phát triển, được điều chế bằng quy trình tạo bọt lỏng siêu giới hạn, so với chất liệu truyền thống thì chất liệu này giảm được đáng kể trọng lượng đế giữa, không chỉ giúp tính năng đàn hồi được phát huy rõ rệt, mà còn kéo dài được tuổi thọ sử dụng, tăng cường thêm tính năng của sản phẩm. Thông qua các điều chỉnh sát với mục tiêu tính năng và chi tiết hơn, để phù với tính chất cạnh tranh của các môn thể thao khác nhau như chạy, bóng rổ, cầu lông, bóng bàn, v.v….nâng cao hiệu suất tốt cho các vận động viên với các mục mục đích sử dụng khác nhau.\r\n\r\nTUFF RB là vật liệu cao su có khả năng chống mài mòn cao, tốt hơn các vật liệu cao su thông thường và có thể cải thiện hiệu quả khả năng chống mài mòn của đế, do đó kéo dài tuổi thọ của giày.\r\n'),
(6, 'Thiết kế:\r\n\r\nKiểu dáng: Giày chạy bộ nam với thiết kế hiện đại, năng động, phù hợp cho tập luyện và thi đấu.\r\nMàu sắc: Xanh lam nhạt (“Vapor Blue”) – Màu sắc trẻ trung, trang nhã, dễ phối đồ.\r\nChất liệu:\r\nThân giày: Vải dệt kim cao cấp – Mềm mại, thoáng khí, co giãn tốt, ôm sát bàn chân.\r\nĐế giữa: Cấu tạo từ bọt nhẹ – Êm ái, giảm chấn hiệu quả, hỗ trợ vận động linh hoạt.\r\nĐế ngoài: Cao su tổng hợp – Bền bỉ, chống mài mòn tốt, tăng độ bám cho từng bước chân.\r\nCông nghệ:\r\n\r\nLi-Ning Cloud: Công nghệ đệm tiên tiến giúp giảm chấn tối ưu, mang lại cảm giác nhẹ nhàng và êm ái khi chạy bộ.\r\nHufeng: Chất liệu cao su đặc biệt giúp tăng độ bám, chống trơn trượt trên mọi địa hình.\r\nBreathable Upper: Lớp vải thoáng khí giúp giữ cho bàn chân luôn khô ráo và thoải mái.\r\nƯu điểm:\r\n\r\nThoải mái: Thiết kế ôm sát, chất liệu mềm mại, thoáng khí mang lại cảm giác thoải mái tối ưu cho người sử dụng.\r\nÊm ái: Công nghệ đệm Li-Ning Cloud giúp giảm chấn hiệu quả, bảo vệ đôi chân khỏi các tác động lực khi chạy bộ.\r\nBền bỉ: Chất liệu cao cấp cùng các công nghệ hiện đại giúp tăng độ bền cho sản phẩm.\r\nChống trơn trượt: Đế ngoài cao su tổng hợp với chất liệu Hufeng tăng độ bám, chống trơn trượt trên mọi địa hình.\r\nThiết kế thời trang: Kiểu dáng hiện đại, trẻ trung, phù hợp cho cả tập luyện và thi đấu.\r\nLưu ý:\r\n\r\nNên chọn size giày phù hợp với kích thước bàn chân để đảm bảo sự thoải mái khi sử dụng.\r\nGiữ cho giày luôn sạch sẽ và khô ráo để bảo quản sản phẩm được tốt nhất.\r\nThay giày định kỳ để đảm bảo hiệu quả sử dụng và bảo vệ sức khỏe đôi chân.\r\nTổng kết:\r\n\r\nGiày Chạy Bộ Li-Ning “Vapor Blue” là lựa chọn tuyệt vời cho các vận động viên yêu thích chạy bộ, đặc biệt là những ai quan tâm đến sự thoải mái, êm ái và độ bền bỉ. Với thiết kế thời trang và màu sắc trẻ trung, đây cũng là một sản phẩm phù hợp cho các hoạt động thể thao khác như tập gym, đi bộ,…\r\n'),
(7, 'Chất liệu :TEXTILE+TPU\r\nCông nghệnbsp;: LIGHT FOAM ULTRA, HEEL LOC, PROBAR LOC, TUF RB\r\nDòng sản phẩm :nbsp;Running/ Chạy bộ\r\nXuất xứ : Trung Quốc\r\nLIGHT FOAM ULTRA :nbsp;thông qua việc bổ sung nhiều loại chất đàn hồi nhiệt dẻo có đặc tính ưu việt và kết hợp chúng với kỹ thuật biến tính chất liệu đặc biệt khiến chất liệu đế giữa được trộn đều hơn, cấu trúc tế bào chặt chẽ hơn. Đế giữa được làm bằng phương pháp này nhẹ hơn, có độ đàn hồi tốt hơn và đế ít bị biến dạng hơn, cung cấp đủ động năng lưu trữ cho vận động thể thao\r\n \r\n HEEL LOC :nbsp;là phần bao quanh gót giày có tính năng hỗ trợ ổn định; cho 2 chân được hỗ trợ một cách tôt nhất, khiến chân khi rời khỏi mặt đất được hiệu quả hơn, trong bất kỳ giải đoạn vận động nào cũng đều giúp bạn giữ thăng bằng cho 2 chân; tính ổn định và hỗ trợ cực tốt.\r\n\r\n PROBAR LOC là bộ phận nhựa nhiệt dẻo được gắn vào phần vòm nối liền bàn chân trước và gót chân, có tính năng hỗ trợ vòm bàn chân trong quá trình vận động, trợ lực tốt nhất cho vòm bàn chân trong mỗi bước tập luyện, đồng thời cũng giảm gánh nặng cho vòm bàn chân.\r\n\r\n TUFF RB là chất liệu cao su có khả năng chống mài mòn cao, có khả năng chống mài mòn tốt hơn so với chất liệu cao su thông thường; có hiệu quả trong việc nâng cao tính năng chống mài mòn cho đế từ đó kéo dài tuổi thọ cho giày.\r\n'),
(8, 'Chất liệu :nbsp;TEXTILE+SYNTHETIC LEATHER\r\nThiết kế cổ ngắn, dáng giàynbsp;dễ phối trang phục\r\nCông nghệ : LIGHT FOAM\r\nĐế ngoài cao su + Đế giữa :nbsp;IP + TPU\r\nXuất xứ: Trung Quốc\r\nSử dụng vật liệu đệm Lightfoam để mang lại trải nghiệm bước đi thoải mái hơn, với thiết kế dành cho người chạy bộ hàng ngày, cung cấp sự hỗ trợ an toàn và độ bám dính lâu dài, giúp người chạy bộ cảm thấy thoải mái và dễ dàng di chuyển.\r\n\r\nLIGHT FOAM\r\n\r\nCông nghệ đế giữa của LIGHT FOAM của Li Ning sử dụng chất đồng trùng hợp olefin hiệu suất cao để thay thế EVA truyền thống, đồng thời được trang bị hệ thống tạo cầu và tạo bọt polymer do Li Ning tự phát triển, có thể làm cho các lỗ tạo bọt mịn và đồng đều hơn, do đó giảm mật độ. Giảm trọng lượng của đế giữa giúp cải thiện đáng kể độ đàn hồi của đáy.\r\nThiết kế tạo hình đế giữa đại diện được tạo ra bằng cách kéo dài dọc theo tường bên, nâng cao sự phong phú của hình dáng giày\r\n\r\nBảng hướng dẫn chọn size giày Nữ ( Theo Size Giày US)'),
(9, 'Giày Li-Ning Speed 9 Premium ‘Ice Cream’ ABAS071-5 là một phiên bản đặc biệt của dòng giày Speed 9 Premium của thương hiệu Li-Ning, nổi bật với thiết kế và công nghệ tiên tiến dành cho các vận động viên cầu lông và các môn thể thao đòi hỏi hiệu suất cao. Dưới đây là mô tả chi tiết về mẫu giày này:\r\n\r\n1. Thiết kế và Màu sắc:\r\nChủ Đề ‘Ice Cream’: Mẫu giày này được thiết kế với chủ đề ‘Ice Cream’, tạo cảm giác vui tươi và trẻ trung. Sử dụng các màu sắc pastel như xanh nhạt, hồng và trắng, giày mang đến một vẻ ngoài tươi sáng và nổi bật.\r\nChi Tiết Họa Tiết: Các chi tiết trên giày thường được in hình và kết cấu độc đáo, gợi ý về hình ảnh kem và các yếu tố liên quan đến chủ đề này. Thiết kế này không chỉ đẹp mắt mà còn dễ nhận diện.\r\n2. Công Nghệ và Tính Năng:\r\nHệ Thống Đệm: Được trang bị công nghệ đệm tiên tiến, giúp hấp thụ sốc hiệu quả và cung cấp cảm giác thoải mái tối ưu khi di chuyển. Công nghệ đệm thường bao gồm các lớp đệm EVA hoặc PU, mang đến sự hỗ trợ và giảm căng thẳng cho chân.\r\nĐế Giày: Đế ngoài của giày được làm từ cao su chống trượt, thiết kế với các hoa văn đặc biệt giúp bám dính tốt trên mặt sân, tăng cường độ ổn định và kiểm soát chuyển động. Đế giữa thường được trang bị công nghệ hỗ trợ và giảm chấn.\r\nCấu Trúc Bảo Vệ: Giày có cấu trúc bảo vệ đặc biệt ở mũi giày và gót chân, giúp giảm thiểu chấn thương và bảo vệ đôi chân trong các tình huống chơi thể thao căng thẳng.\r\n3. Chất Liệu:\r\nUpper (Phần trên của giày): Thường được làm từ chất liệu mesh (vải lưới) hoặc synthetic (nhân tạo), giúp giày nhẹ và thoáng khí. Điều này giúp đôi chân của bạn luôn khô ráo và thoải mái trong suốt quá trình chơi.\r\nLining (Lót trong giày): Lót trong giày được làm từ các vật liệu mềm mại và có khả năng thấm hút mồ hôi tốt, giúp giảm thiểu sự khó chịu và mùi hôi.\r\n4. Tính Năng Thoải Mái và Hỗ Trợ:\r\nHệ Thống Buộc Dây: Hệ thống buộc dây được thiết kế để đảm bảo giày vừa vặn chắc chắn, tránh tình trạng trượt chân khi vận động mạnh.\r\nCổ Giày: Cổ giày thường được thiết kế ôm vừa vặn với cổ chân, cung cấp sự hỗ trợ và giảm nguy cơ bị chấn thương.\r\n5. Đối Tượng Sử Dụng:\r\nVận Động Viên: Giày Li-Ning Speed 9 Premium ‘Ice Cream’ phù hợp cho các vận động viên cầu lông, tennis hoặc các môn thể thao cần sự linh hoạt và độ bám dính tốt.\r\nNgười Yêu Thích Thể Thao: Ngoài việc dùng cho thi đấu, mẫu giày này cũng là sự lựa chọn lý tưởng cho những người yêu thích thể thao và muốn có một đôi giày thời trang, nổi bật.\r\n6. Tính Năng Thẩm Mỹ:\r\nPhong Cách: Với thiết kế tươi sáng và trẻ trung, giày này không chỉ đáp ứng nhu cầu về chức năng mà còn làm nổi bật phong cách cá nhân của người sử dụng.\r\nLi-Ning Speed 9 Premium ‘Ice Cream’ ABAS071-5 không chỉ là một đôi giày thể thao hiệu suất cao mà còn là một món đồ thời trang đáng chú ý, phù hợp với các vận động viên cũng như những người yêu thích thể thao.\r\n\r\nCông nghệ đế giữa của LIGHT FOAM của Li Ning sử dụng chất đồng trùng hợp olefin hiệu suất cao để thay thế EVA truyền thống, đồng thời được trang bị hệ thống tạo cầu và tạo bọt polymer do Li Ning tự phát triển, có thể làm cho các lỗ tạo bọt mịn và đồng đều hơn, do đó giảm mật độ. Giảm trọng lượng của đế giữa giúp cải thiện đáng kể độ đàn hồi của đáy.\r\nThiết kế tạo hình đế giữa đại diện được tạo ra bằng cách kéo dài dọc theo tường bên, nâng cao sự phong phú của hình dáng giày\r\n\r\nBảng hướng dẫn chọn size giày Nữ ( Theo Size Giày US)'),
(10, 'Mua Giày Lining Air Raid 9 ‘White’ ABAS073-7 chính hãng 100% có sẵn tại Jordan 1. Giao hàng miễn phí trong 1 ngày. Cam kết đền tiền X5 nếu phát hiện Fake. Đổi trả miễn phí size. FREE vệ sinh giày trọn đời. MUA NGAY !'),
(11, 'Chất liệu : Synthetic leather+textile\r\nDòng sản phẩm :Basketball/ Bóng rổ\r\nXuất xứ : Chính hãng\r\nGiày bóng rổ chuyên nghiệp sử dụng cách phối màu đơn giản và giản dị. Phần trên được làm bằng chất liệu thoải mái và mang lại cảm giác thoải mái cho bàn chân. Logo Li-Ning trên thân giày làm nổi bật nét đặc trưng của thương hiệu. Thiết kế chống va chạm ở ngón chân giúp giảm trầy xước hoặc va chạm ở ngón chân và bảo vệ từng bước đi.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `materials`
--

CREATE TABLE `materials` (
  `id_material` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `materials`
--

INSERT INTO `materials` (`id_material`, `name`) VALUES
(4, 'IP + TPU'),
(6, 'Synthetic leather+textile'),
(3, 'TEXTILE'),
(5, 'Textile+PU'),
(2, 'Textile+Pu&Rb+Eva'),
(1, 'Textile+TPU');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id_order` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `id_address` int(10) UNSIGNED NOT NULL,
  `status` enum('pending','processing','completed','cancelled') NOT NULL DEFAULT 'pending',
  `address` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id_order_item` int(10) UNSIGNED NOT NULL,
  `id_order` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id_payment` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `payment_method` enum('cash','credit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment_history`
--

CREATE TABLE `payment_history` (
  `id_history` int(10) UNSIGNED NOT NULL,
  `id_payment` int(10) UNSIGNED NOT NULL,
  `id_order` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_product` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `shoe_code` varchar(255) NOT NULL,
  `size` varchar(20) DEFAULT NULL,
  `picture_path` varchar(255) DEFAULT NULL,
  `price` int(10) UNSIGNED DEFAULT NULL,
  `stock` int(10) UNSIGNED DEFAULT NULL,
  `color_id` int(10) UNSIGNED DEFAULT NULL,
  `material_id` int(10) UNSIGNED DEFAULT NULL,
  `sex_id` int(10) UNSIGNED DEFAULT NULL,
  `id_product_variant` int(10) UNSIGNED DEFAULT NULL,
  `description_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_product`, `product_name`, `shoe_code`, `size`, `picture_path`, `price`, `stock`, `color_id`, `material_id`, `sex_id`, `id_product_variant`, `description_id`) VALUES
(1, 'Boom Infinity 2', 'ARVS016-3', '6', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Boom Infinity 2 nữ ARVS016-3/', 2000000, 100, 1, 1, 1, 1, 1),
(2, 'Boom Infinity 2', 'ARVS016-3', '6.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Boom Infinity 2 nữ ARVS016-3/', 2346545, 100, 1, 1, 1, 1, 1),
(3, 'Boom Infinity 2', 'ARVS016-3', '7', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Boom Infinity 2 nữ ARVS016-3/', 2346545, 100, 1, 1, 1, 1, 1),
(4, 'Boom Infinity 2', 'ARVS016-3', '7.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Boom Infinity 2 nữ ARVS016-3/', 2346545, 100, 1, 1, 1, 1, 1),
(5, 'Boom Infinity 2', 'ARVS016-3', '8', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Boom Infinity 2 nữ ARVS016-3/', 2346545, 100, 1, 1, 1, 1, 1),
(6, 'Boom Infinity 2', 'ARVS016-3', '8.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Boom Infinity 2 nữ ARVS016-3/', 2346545, 100, 1, 1, 1, 1, 1),
(7, 'Boom Infinity 2', 'ARVS016-3', '5.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Boom Infinity 2 nữ ARVS016-3/', 2346545, 100, 1, 1, 1, 1, 1),
(8, 'Chitu 6 Pro', 'ARMT014-7V', '5.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 6 Pro nữ ARMT014-7V/', 2346545, 100, 2, 1, 1, 1, 2),
(9, 'Chitu 6 Pro', 'ARMT014-7V', '6', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 6 Pro nữ ARMT014-7V/', 2346545, 100, 2, 1, 1, 1, 2),
(10, 'Chitu 6 Pro', 'ARMT014-7V', '6.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 6 Pro nữ ARMT014-7V/', 2346545, 100, 2, 1, 1, 1, 2),
(11, 'Chitu 6 Pro', 'ARMT014-7V', '7', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 6 Pro nữ ARMT014-7V/', 2346545, 100, 2, 1, 1, 1, 2),
(12, 'Chitu 6 Pro', 'ARMT014-7V', '7.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 6 Pro nữ ARMT014-7V/', 2346545, 100, 2, 1, 1, 1, 2),
(13, 'Chitu 6 Pro', 'ARMT014-7V', '8', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 6 Pro nữ ARMT014-7V/', 2346545, 100, 2, 1, 1, 1, 2),
(14, 'Chitu 6 Pro', 'ARMT014-7V', '8.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 6 Pro nữ ARMT014-7V/', 2346545, 100, 2, 1, 1, 1, 2),
(15, 'FEIDIAN 3 CHALLENGER', 'ARMT037-1', '5.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ FEIDIAN 3 CHALLENGER nam ARMT037-1/', 2346545, 100, 3, 1, 2, 1, 3),
(16, 'FEIDIAN 3 CHALLENGER', 'ARMT037-1', '6', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ FEIDIAN 3 CHALLENGER nam ARMT037-1/', 2346545, 100, 3, 1, 2, 1, 3),
(17, 'FEIDIAN 3 CHALLENGER', 'ARMT037-1', '6.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ FEIDIAN 3 CHALLENGER nam ARMT037-1/', 2346545, 100, 3, 1, 2, 1, 3),
(18, 'FEIDIAN 3 CHALLENGER', 'ARMT037-1', '7', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ FEIDIAN 3 CHALLENGER nam ARMT037-1/', 2346545, 100, 3, 1, 2, 1, 3),
(19, 'FEIDIAN 3 CHALLENGER', 'ARMT037-1', '7.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ FEIDIAN 3 CHALLENGER nam ARMT037-1/', 2346545, 100, 3, 1, 2, 1, 3),
(20, 'FEIDIAN 3 CHALLENGER', 'ARMT037-1', '8', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ FEIDIAN 3 CHALLENGER nam ARMT037-1/', 2346545, 100, 3, 1, 2, 1, 3),
(21, 'FEIDIAN 3 CHALLENGER', 'ARMT037-1', '8.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ FEIDIAN 3 CHALLENGER nam ARMT037-1/', 2346545, 100, 3, 1, 2, 1, 3),
(22, 'FEIDIAN 3 CHALLENGER', 'ARMT037-1', '9', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ FEIDIAN 3 CHALLENGER nam ARMT037-1/', 2346545, 100, 3, 1, 2, 1, 3),
(23, 'FEIDIAN 3 CHALLENGER', 'ARMT037-1', '9.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ FEIDIAN 3 CHALLENGER nam ARMT037-1/', 2346545, 100, 3, 1, 2, 1, 3),
(24, 'FEIDIAN 3 CHALLENGER', 'ARMT037-1', '10', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ FEIDIAN 3 CHALLENGER nam ARMT037-1/', 2346545, 100, 3, 1, 2, 1, 3),
(25, 'Chitu 7 Pro', 'ARPU001-6V', '5.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 7 Pro Nam ARPU001-6V/', 2346545, 100, 4, 2, 2, 1, 4),
(26, 'Chitu 7 Pro', 'ARPU001-6V', '6', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 7 Pro Nam ARPU001-6V/', 2346545, 100, 4, 2, 2, 1, 4),
(27, 'Chitu 7 Pro', 'ARPU001-6V', '6.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 7 Pro Nam ARPU001-6V/', 2346545, 100, 4, 2, 2, 1, 4),
(28, 'Chitu 7 Pro', 'ARPU001-6V', '7', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 7 Pro Nam ARPU001-6V/', 2346545, 100, 4, 2, 2, 1, 4),
(29, 'Chitu 7 Pro', 'ARPU001-6V', '7.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 7 Pro Nam ARPU001-6V/', 2346545, 100, 4, 2, 2, 1, 4),
(30, 'Chitu 7 Pro', 'ARPU001-6V', '8', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 7 Pro Nam ARPU001-6V/', 2346545, 100, 4, 2, 2, 1, 4),
(31, 'Chitu 7 Pro', 'ARPU001-6V', '8.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 7 Pro Nam ARPU001-6V/', 2346545, 100, 4, 2, 2, 1, 4),
(32, 'Chitu 7 Pro', 'ARPU001-6V', '9', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 7 Pro Nam ARPU001-6V/', 2346545, 100, 4, 2, 2, 1, 4),
(33, 'Chitu 7 Pro', 'ARPU001-6V', '9.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 7 Pro Nam ARPU001-6V/', 2346545, 100, 4, 2, 2, 1, 4),
(34, 'Chitu 7 Pro', 'ARPU001-6V', '10', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 7 Pro Nam ARPU001-6V/', 2346545, 100, 4, 2, 2, 1, 4),
(35, 'Chitu 7 Pro', 'ARPU001-6V', '5.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 7 Pro Nam ARPU001-6V/', 2346545, 100, 2, 2, 2, 1, 4),
(36, 'Chitu 7 Pro', 'ARPU001-6V', '6', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 7 Pro Nam ARPU001-6V/', 2346545, 100, 2, 2, 2, 1, 4),
(37, 'Chitu 7 Pro', 'ARPU001-6V', '6.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 7 Pro Nam ARPU001-6V/', 2346545, 100, 2, 2, 2, 1, 4),
(38, 'Chitu 7 Pro', 'ARPU001-6V', '7', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 7 Pro Nam ARPU001-6V/', 2346545, 100, 2, 2, 2, 1, 4),
(39, 'Chitu 7 Pro', 'ARPU001-6V', '7.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 7 Pro Nam ARPU001-6V/', 2346545, 100, 2, 2, 2, 1, 4),
(40, 'Chitu 7 Pro', 'ARPU001-6V', '8', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 7 Pro Nam ARPU001-6V/', 2346545, 100, 2, 2, 2, 1, 4),
(41, 'Chitu 7 Pro', 'ARPU001-6V', '8.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 7 Pro Nam ARPU001-6V/', 2346545, 100, 2, 2, 2, 1, 4),
(42, 'Chitu 7 Pro', 'ARPU001-6V', '9', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 7 Pro Nam ARPU001-6V/', 2346545, 100, 2, 2, 2, 1, 4),
(43, 'Chitu 7 Pro', 'ARPU001-6V', '9.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 7 Pro Nam ARPU001-6V/', 2346545, 100, 2, 2, 2, 1, 4),
(44, 'Chitu 7 Pro', 'ARPU001-6V', '10', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Chitu 7 Pro Nam ARPU001-6V/', 2346545, 100, 2, 2, 2, 1, 4),
(45, 'Lie Jun 6th', 'ARZS003-13', '5.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Lie Jun 6th nam ARZS003-13/', 2346545, 100, 1, 1, 2, 1, 5),
(46, 'Lie Jun 6th', 'ARZS003-13', '6', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Lie Jun 6th nam ARZS003-13/', 2346545, 100, 1, 1, 2, 1, 5),
(47, 'Lie Jun 6th', 'ARZS003-13', '6.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Lie Jun 6th nam ARZS003-13/', 2346545, 100, 1, 1, 2, 1, 5),
(48, 'Lie Jun 6th', 'ARZS003-13', '7', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Lie Jun 6th nam ARZS003-13/', 2346545, 100, 1, 1, 2, 1, 5),
(49, 'Lie Jun 6th', 'ARZS003-13', '7.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Lie Jun 6th nam ARZS003-13/', 2346545, 100, 1, 1, 2, 1, 5),
(50, 'Lie Jun 6th', 'ARZS003-13', '8', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Lie Jun 6th nam ARZS003-13/', 2346545, 100, 1, 1, 2, 1, 5),
(51, 'Lie Jun 6th', 'ARZS003-13', '8.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Lie Jun 6th nam ARZS003-13/', 2346545, 100, 1, 1, 2, 1, 5),
(52, 'Lie Jun 6th', 'ARZS003-13', '9', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Lie Jun 6th nam ARZS003-13/', 2346545, 100, 1, 1, 2, 1, 5),
(53, 'Lie Jun 6th', 'ARZS003-13', '9.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Lie Jun 6th nam ARZS003-13/', 2346545, 100, 1, 1, 2, 1, 5),
(54, 'Lie Jun 6th', 'ARZS003-13', '10', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Lie Jun 6th nam ARZS003-13/', 2346545, 100, 1, 1, 2, 1, 5),
(55, 'Vapor Blue', 'AGLT103-3B', '5.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày Chạy bộ Nam AGLT103-3B/', 2346545, 100, 5, 3, 2, 1, 6),
(56, 'Vapor Blue', 'AGLT103-3B', '6', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày Chạy bộ Nam AGLT103-3B/', 2346545, 100, 5, 3, 2, 1, 6),
(57, 'Vapor Blue', 'AGLT103-3B', '6.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày Chạy bộ Nam AGLT103-3B/', 2346545, 100, 5, 3, 2, 1, 6),
(58, 'Vapor Blue', 'AGLT103-3B', '7', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày Chạy bộ Nam AGLT103-3B/', 2346545, 100, 5, 3, 2, 1, 6),
(59, 'Vapor Blue', 'AGLT103-3B', '7.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày Chạy bộ Nam AGLT103-3B/', 2346545, 100, 5, 3, 2, 1, 6),
(60, 'Vapor Blue', 'AGLT103-3B', '8', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày Chạy bộ Nam AGLT103-3B/', 2346545, 100, 5, 3, 2, 1, 6),
(61, 'Vapor Blue', 'AGLT103-3B', '8.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày Chạy bộ Nam AGLT103-3B/', 2346545, 100, 5, 3, 2, 1, 6),
(62, 'Vapor Blue', 'AGLT103-3B', '9', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày Chạy bộ Nam AGLT103-3B/', 2346545, 100, 5, 3, 2, 1, 6),
(63, 'Vapor Blue', 'AGLT103-3B', '9.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày Chạy bộ Nam AGLT103-3B/', 2346545, 100, 5, 3, 2, 1, 6),
(64, 'Vapor Blue', 'AGLT103-3B', '10', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày Chạy bộ Nam AGLT103-3B/', 2346545, 100, 5, 3, 2, 1, 6),
(65, 'Soft Go', 'ARHT020-9V', '5.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Nữ ARHT020-9V/', 2346545, 100, 2, 1, 1, 1, 7),
(66, 'Soft Go', 'ARHT020-9V', '6', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Nữ ARHT020-9V/', 2346545, 100, 2, 1, 1, 1, 7),
(67, 'Soft Go', 'ARHT020-9V', '6.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Nữ ARHT020-9V/', 2346545, 100, 2, 1, 1, 1, 7),
(68, 'Soft Go', 'ARHT020-9V', '7', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Nữ ARHT020-9V/', 2346545, 100, 2, 1, 1, 1, 7),
(69, 'Soft Go', 'ARHT020-9V', '7.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Nữ ARHT020-9V/', 2346545, 100, 2, 1, 1, 1, 7),
(70, 'Soft Go', 'ARHT020-9V', '8', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Nữ ARHT020-9V/', 2346545, 100, 2, 1, 1, 1, 7),
(71, 'Soft Go', 'ARHT020-9V', '8.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Nữ ARHT020-9V/', 2346545, 100, 2, 1, 1, 1, 7),
(72, 'Soft Go', 'ARHT020-9V', '9', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Nữ ARHT020-9V/', 2346545, 100, 2, 1, 1, 1, 7),
(73, 'Soft Go', 'ARHT020-9V', '9.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Nữ ARHT020-9V/', 2346545, 100, 2, 1, 1, 1, 7),
(74, 'Soft Go', 'ARHT020-9V', '10', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Nữ ARHT020-9V/', 2346545, 100, 2, 1, 1, 1, 7),
(75, 'Yue Ying 2', 'ARHT006-7', '5.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Yue Ying 2 nữ ARHT006-7/', 2346545, 100, 2, 4, 1, 1, 8),
(76, 'Yue Ying 2', 'ARHT006-7', '6', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Yue Ying 2 nữ ARHT006-7/', 2346545, 100, 2, 4, 1, 1, 8),
(77, 'Yue Ying 2', 'ARHT006-7', '6.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Yue Ying 2 nữ ARHT006-7/', 2346545, 100, 2, 4, 1, 1, 8),
(78, 'Yue Ying 2', 'ARHT006-7', '7', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Yue Ying 2 nữ ARHT006-7/', 2346545, 100, 2, 4, 1, 1, 8),
(79, 'Yue Ying 2', 'ARHT006-7', '7.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Yue Ying 2 nữ ARHT006-7/', 2346545, 100, 2, 4, 1, 1, 8),
(80, 'Yue Ying 2', 'ARHT006-7', '8', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Yue Ying 2 nữ ARHT006-7/', 2346545, 100, 2, 4, 1, 1, 8),
(81, 'Yue Ying 2', 'ARHT006-7', '8.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Yue Ying 2 nữ ARHT006-7/', 2346545, 100, 2, 4, 1, 1, 8),
(82, 'Yue Ying 2', 'ARHT006-7', '9', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Yue Ying 2 nữ ARHT006-7/', 2346545, 100, 2, 4, 1, 1, 8),
(83, 'Yue Ying 2', 'ARHT006-7', '9.5', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Yue Ying 2 nữ ARHT006-7/', 2346545, 100, 2, 4, 1, 1, 8),
(84, 'Yue Ying 2', 'ARHT006-7', '10', '../../../public/assets/img/Sản Phẩm/giày chạy bộ/Giày chạy bộ Yue Ying 2 nữ ARHT006-7/', 2346545, 100, 2, 4, 1, 1, 8),
(85, 'Dung King', 'ABAS071-5', '5.5', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS071-5/', 2346545, 100, 3, 1, 2, 2, 9),
(86, 'Dung King', 'ABAS071-5', '6', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS071-5/', 2346545, 100, 3, 1, 2, 2, 9),
(87, 'Dung King', 'ABAS071-5', '6.5', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS071-5/', 2346545, 100, 3, 1, 2, 2, 9),
(88, 'Dung King', 'ABAS071-5', '7', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS071-5/', 2346545, 100, 3, 1, 2, 2, 9),
(89, 'Dung King', 'ABAS071-5', '7.5', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS071-5/', 2346545, 100, 3, 1, 2, 2, 9),
(90, 'Dung King', 'ABAS071-5', '8', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS071-5/', 2346545, 100, 3, 1, 2, 2, 9),
(91, 'Dung King', 'ABAS071-5', '8.5', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS071-5/', 2346545, 100, 3, 1, 2, 2, 9),
(92, 'Dung King', 'ABAS071-5', '9', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS071-5/', 2346545, 100, 3, 1, 2, 2, 9),
(93, 'Dung King', 'ABAS071-5', '9.5', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS071-5/', 2346545, 100, 3, 1, 2, 2, 9),
(94, 'Dung King', 'ABAS071-5', '10', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS071-5/', 2346545, 100, 3, 1, 2, 2, 9),
(95, 'Air Raid 9', 'ABAS073-7', '5.5', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS073-7/', 2346545, 100, 2, 5, 2, 2, 10),
(96, 'Air Raid 9', 'ABAS073-7', '6', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS073-7/', 2346545, 100, 2, 5, 2, 2, 10),
(97, 'Air Raid 9', 'ABAS073-7', '6.5', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS073-7/', 2346545, 100, 2, 5, 2, 2, 10),
(98, 'Air Raid 9', 'ABAS073-7', '7', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS073-7/', 2346545, 100, 2, 5, 2, 2, 10),
(99, 'Air Raid 9', 'ABAS073-7', '7.5', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS073-7/', 2346545, 100, 2, 5, 2, 2, 10),
(100, 'Air Raid 9', 'ABAS073-7', '8', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS073-7/', 2346545, 100, 2, 5, 2, 2, 10),
(101, 'Air Raid 9', 'ABAS073-7', '8.5', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS073-7/', 2346545, 100, 2, 5, 2, 2, 10),
(102, 'Air Raid 9', 'ABAS073-7', '9', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS073-7/', 2346545, 100, 2, 5, 2, 2, 10),
(103, 'Air Raid 9', 'ABAS073-7', '9.5', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS073-7/', 2346545, 100, 2, 5, 2, 2, 10),
(104, 'Air Raid 9', 'ABAS073-7', '10', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS073-7/', 2346545, 100, 2, 5, 2, 2, 10),
(105, 'Master Yi', 'ABAS081-1', '5.5', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS081-1/', 2346545, 100, 6, 6, 2, 2, 11),
(106, 'Master Yi', 'ABAS081-1', '6', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS081-1/', 2346545, 100, 6, 6, 2, 2, 11),
(107, 'Master Yi', 'ABAS081-1', '6.5', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS081-1/', 2346545, 100, 6, 6, 2, 2, 11),
(108, 'Master Yi', 'ABAS081-1', '7', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS081-1/', 2346545, 100, 6, 6, 2, 2, 11),
(109, 'Master Yi', 'ABAS081-1', '7.5', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS081-1/', 2346545, 100, 6, 6, 2, 2, 11),
(110, 'Master Yi', 'ABAS081-1', '8', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS081-1/', 2346545, 100, 6, 6, 2, 2, 11),
(111, 'Master Yi', 'ABAS081-1', '8.5', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS081-1/', 2346545, 100, 6, 6, 2, 2, 11),
(112, 'Master Yi', 'ABAS081-1', '9', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS081-17/', 2346545, 100, 6, 6, 2, 2, 11),
(113, 'Master Yi', 'ABAS081-1', '9.5', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS081-1/', 2346545, 100, 6, 6, 2, 2, 11),
(114, 'Master Yi', 'ABAS081-1', '10', '../../../public/assets/img/Sản Phẩm/giày bóng rổ/Giày bóng rổ nam ABAS081-1/', 2346545, 100, 6, 6, 2, 2, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_variant`
--

CREATE TABLE `product_variant` (
  `id_product_variant` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_variant`
--

INSERT INTO `product_variant` (`id_product_variant`, `name`) VALUES
(1, 'giày chạy bộ'),
(2, 'giày bóng rổ'),
(3, 'giày thời trang'),
(4, 'giày cầu lông');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id_role` tinyint(4) UNSIGNED NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id_role`, `role_name`) VALUES
(0, 'user'),
(1, 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sex`
--

CREATE TABLE `sex` (
  `id_sex` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sex`
--

INSERT INTO `sex` (`id_sex`, `name`) VALUES
(1, 'female'),
(2, 'male\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_users` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` tinyint(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id_users`, `username`, `email`, `password`, `role`) VALUES
(1, 'fsd', 'fsf@fasd.com', '1', 0),
(2, 'admin', 'ledat241205@gmail.com', '1', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id_address`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id_color`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `descriptions`
--
ALTER TABLE `descriptions`
  ADD PRIMARY KEY (`id_description`);

--
-- Chỉ mục cho bảng `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id_material`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `address` (`address`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id_order_item`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `id_payment` (`id_payment`),
  ADD KEY `id_order` (`id_order`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `material_id` (`material_id`),
  ADD KEY `sex_id` (`sex_id`),
  ADD KEY `id_product_variant` (`id_product_variant`),
  ADD KEY `description_id` (`description_id`);

--
-- Chỉ mục cho bảng `product_variant`
--
ALTER TABLE `product_variant`
  ADD PRIMARY KEY (`id_product_variant`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Chỉ mục cho bảng `sex`
--
ALTER TABLE `sex`
  ADD PRIMARY KEY (`id_sex`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id_address` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `colors`
--
ALTER TABLE `colors`
  MODIFY `id_color` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `descriptions`
--
ALTER TABLE `descriptions`
  MODIFY `id_description` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `materials`
--
ALTER TABLE `materials`
  MODIFY `id_material` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id_order_item` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id_payment` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `id_history` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT cho bảng `product_variant`
--
ALTER TABLE `product_variant`
  MODIFY `id_product_variant` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_users`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_users`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_users`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`address`) REFERENCES `addresses` (`id_address`);

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Các ràng buộc cho bảng `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_users`);

--
-- Các ràng buộc cho bảng `payment_history`
--
ALTER TABLE `payment_history`
  ADD CONSTRAINT `payment_history_ibfk_1` FOREIGN KEY (`id_payment`) REFERENCES `payments` (`id_payment`),
  ADD CONSTRAINT `payment_history_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id_color`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id_material`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`sex_id`) REFERENCES `sex` (`id_sex`),
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`id_product_variant`) REFERENCES `product_variant` (`id_product_variant`),
  ADD CONSTRAINT `product_ibfk_5` FOREIGN KEY (`description_id`) REFERENCES `descriptions` (`id_description`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
