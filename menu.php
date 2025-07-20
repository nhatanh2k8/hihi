<?php
// === MÀU SẮC TERMINAL ===
$trang = "\033[1;37m";
$do = "\033[1;31m";
$vang = "\033[1;33m";
$xanh_la = "\033[1;32m";
$xanh_duong = "\033[1;34m";
$tim = "\033[1;35m";
$xanhnhat = "\033[1;36m";

// === CLEAR SCREEN ===
function clear_screen() {
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        system('cls');
    } else {
        system('clear');
    }
}
clear_screen();

// === NGÀY GIỜ ===
date_default_timezone_set("Asia/Ho_Chi_Minh");
$ngay = intval(date("d"));
$thang = date("m");
$nam = date("Y");
$thu = date("l");
$gio = date("H:i:s");

// === TẠO KEY THEO NGÀY ===
$key = "anhcode" . strval($ngay * 2593885817 + 4610273);

// === TẠO LINK VƯỢT KEY ===
$url = "https://anhcode.sbs/client/key.php?key=" . urlencode($key);
$token = "56e38d42f495932dba2473dbb05a8a66974cd4db289dc9529985fbf75a4983f3";
$api_url = "https://yeumoney.com/QL_api.php?token=$token&url=" . urlencode($url) . "&format=json";
$response = @file_get_contents($api_url);
$data = json_decode($response, true);

if (!$data || $data["status"] !== "success") {
    echo $do . "❌ Không thể tạo link lấy key. Kiểm tra mạng hoặc token.\n";
    exit;
}
$short_link = $data["shortenedUrl"];

// === KIỂM TRA KEY ĐÃ LƯU ===
$filename = "anhcode-key.txt";
$saved_key = file_exists($filename) ? trim(file_get_contents($filename)) : null;

// === NẾU KEY CHƯA ĐÚNG → YÊU CẦU NHẬP ===
if ($saved_key !== $key) {
    echo $tim;
    echo "  █████╗ ███╗  ██╗██╗  ██╗     ██████╗  ██████╗ ██████╗ ███████╗\n";
    echo " ██╔══██╗████╗ ██║██║ ██╔╝    ██╔════╝ ██╔═══██╗██╔══██╗██╔════╝\n";
    echo " ███████║██╔██╗██║█████╔╝     ██║  ██╗ ██║   ██║██████╔╝█████╗  \n";
    echo " ██╔══██║██║╚████║██╔═██╗     ██║  ╚█╗ ██║   ██║██╔═══╝ ██╔══╝  \n";
    echo " ██║  ██║██║ ╚███║██║ ╚██╗    ╚██████╔╝╚██████╔╝██║     ███████╗\n";
    echo " ╚═╝  ╚═╝╚═╝  ╚══╝╚═╝  ╚═╝     ╚═════╝  ╚═════╝ ╚═╝     ╚══════╝\n";
    echo $xanh_la . "         ADMIN : ANH CODE - TOOL FREE\n";
    echo $xanhnhat . "         Ngày: $thu / $ngay / $thang / $nam - Giờ: $gio\n\n";
    echo $do . "🔐 Key sai hoặc chưa có!\n";
    echo $xanhnhat . "👉 Lấy key tại: $short_link\n";
    echo $vang . "➡️ Hãy nhập key tại đây: ";
    $handle = fopen("php://stdin", "r");
    $input_key = trim(fgets($handle));

    if ($input_key === $key) {
        echo $xanh_la . "✅ Key chính xác! Truy cập thành công...\n";
        file_put_contents($filename, $input_key);
    } else {
        echo $do . "❌ Key sai! Vui lòng thử lại.\n";
        exit;
    }
}

// === DANH SÁCH TOOL (MÃ HÓA LINK BẰNG BASE64) ===
$tools = [
    [
        "id" => 1,
        "name" => "TƯƠNG TÁC CHÉO",
        "desc" => "FACEBOOK - CHẠY BẰNG TOKEN",
        "url" => base64_encode("https://raw.githubusercontent.com/nhatanh2k8/hihi/main/anhcode1.php")
    ],
    [
        "id" => 1.1,
        "name" => "TOKEN FACEBOOK",
        "desc" => "LẤY TOKEN FB ĐỂ CHẠY TTC",
        "url" => base64_encode("https://raw.githubusercontent.com/nhatanh2k8/hihi/main/token.php")
    ],
    [
        "id" => 2,
        "name" => "TRAO ĐỔI SUB",
        "desc" => "TIKTOK",
        "url" => base64_encode("https://raw.githubusercontent.com/nhatanh2k8/hihi/main/tdstt_10.php")
    ],
    [
        "id" => 3,
        "name" => "GOLIKE       ",
        "desc" => "TIKTOK V1",
        "url" => base64_encode("https://raw.githubusercontent.com/nhatanh2k8/hihi/main/golikett_10.php")
    ],
    [
        "id" => 3.1,
        "name" => "GOLIKE      ",
        "desc" => "TIKTOK V2",
        "url" => base64_encode("https://raw.githubusercontent.com/nhatanh2k8/hihi/main/goliketiktok_10.php")
    ],
    [
        "id" => 3.2,
        "name" => "GOLIKE      ",
        "desc" => "THREAD",
        "url" => base64_encode("https://raw.githubusercontent.com/nhatanh2k8/hihi/main/golikethread_10.php")
    ],
    [
        "id" => 3.3,
        "name" => "GOLIKE      ",
        "desc" => "SNAPCHAT",
        "url" => base64_encode("https://raw.githubusercontent.com/nhatanh2k8/hihi/main/golikesnapchat_10.php")
    ],
    [
        "id" => 3.4,
        "name" => "GOLIKE      ",
        "desc" => "SHOPPE",
        "url" => base64_encode("https://raw.githubusercontent.com/nhatanh2k8/hihi/main/golikeshoppe_10.php")
    ],
    [
        "id" => 3.5,
        "name" => "GOLIKE      ",
        "desc" => "LINKEDIN",
        "url" => base64_encode("https://raw.githubusercontent.com/nhatanh2k8/hihi/main/golikelinkedin_10.php")
    ],
    [
        "id" => 3.6,
        "name" => "GOLIKE      ",
        "desc" => "INSTARAM V1",
        "url" => base64_encode("https://raw.githubusercontent.com/nhatanh2k8/hihi/main/golikeig_10.php")
    ],
    [
        "id" => 3.7,
        "name" => "GOLIKE      ",
        "desc" => "INSTARAM V2",
        "url" => base64_encode("https://raw.githubusercontent.com/nhatanh2k8/hihi/main/golikeinstagram_10.php")
    ],
    [
        "id" => 3.8,
        "name" => "GOLIKE      ",
        "desc" => "TWITTER",
        "url" => base64_encode("https://raw.githubusercontent.com/nhatanh2k8/hihi/main/golike_tw.php")
    ],
];

// === BANNER VÀ THỜI GIAN ===
clear_screen();
echo $tim;
echo "  █████╗ ███╗  ██╗██╗  ██╗     ██████╗  ██████╗ ██████╗ ███████╗\n";
echo " ██╔══██╗████╗ ██║██║ ██╔╝    ██╔════╝ ██╔═══██╗██╔══██╗██╔════╝\n";
echo " ███████║██╔██╗██║█████╔╝     ██║  ██╗ ██║   ██║██████╔╝█████╗  \n";
echo " ██╔══██║██║╚████║██╔═██╗     ██║  ╚█╗ ██║   ██║██╔═══╝ ██╔══╝  \n";
echo " ██║  ██║██║ ╚███║██║ ╚██╗    ╚██████╔╝╚██████╔╝██║     ███████╗\n";
echo " ╚═╝  ╚═╝╚═╝  ╚══╝╚═╝  ╚═╝     ╚═════╝  ╚═════╝ ╚═╝     ╚══════╝\n";
echo $xanh_la . "         ADMIN : ANH CODE - TOOL FREE\n";
echo $xanhnhat . "         Ngày: $thu / $ngay / $thang / $nam - Giờ: $gio\n\n";
echo "-------------------------------------------------------\n";
// === HIỂN THỊ TOOL ===
echo $xanh_duong . "ID\tTên Tool\t\tMô Tả\n";
echo "-------------------------------------------------------\n";
foreach ($tools as $tool) {
    echo "{$tool['id']}\t{$tool['name']}\t\t{$tool['desc']}\n";
echo "-------------------------------------------------------\n";
}

// === NHẬP ID TOOL ===
echo $vang . "\n🔢 Nhập ID tool bạn muốn chạy: ";
$id = trim(fgets(STDIN));

// === TÌM TOOL THEO ID ===
$selected_tool = null;
foreach ($tools as $tool) {
    if ($tool["id"] == $id) {
        $selected_tool = $tool;
        break;
    }
}

// === CHẠY TOOL (KHÔNG HIỆN LINK GITHUB) ===
if ($selected_tool) {
    $url = base64_decode($selected_tool["url"]);
    $tool_code = @file_get_contents($url);

    if ($tool_code === false) {
        echo $do . "❌ Không thể tải tool từ GitHub.\n";
        exit;
    }

    echo $xanh_la . "\n🔧 Đang chạy tool: {$selected_tool['name']}...\n\n";
    eval("?>$tool_code");
} else {
    echo $do . "❌ Không tìm thấy tool với ID đã chọn.\n";
}
?>
