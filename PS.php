<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>PS</title>
</head>

<body>
    <?php include 'header.php'; ?>


    <?php
    include 'conn.php';
    $conn = getconnaction();
    $sql = "SELECT * FROM lognet LIMIT 1";
    $data = $conn->query($sql);
    $row = $data->fetch();
    $dayM = $row['dayM'];
    $createdTime = $row['created_ar'];  // example: 2025-06-13 10:00:00
    $sizeKB = $dayM * 1024; // convert MB to KB
    ?>

    <form action="index.php" name="login" class="F">
        <table>
            <tbody>
                <tr>
                    <td>10.0.6.10</td>
                    <td>:عنوان الشبكة</td>
                </tr>
                <tr>
                    <td>
                        <span id="randomNumberDisplay"></span> KP
                        <script src="script.js">
                            generateRandomNumber('randomNumberDisplay');
                        </script>
                    </td>
                    <td>:التحميل</td>
                </tr>
                <tr>
                    <td>
                        <span id="randomNumberDisplay1"></span> KP
                        <script src="script.js">
                            generateRandomNumber('randomNumberDisplay1');
                        </script>
                    </td>
                    <td>:الرفع</td>
                </tr>
                <tr>
                    <td><?php echo htmlspecialchars($dayM); ?> MB</td>
                    <td>:الرصيد</td>
                </tr>
                <tr>
                    <td><span id="dataAmount"></span></td>
                    <td>:الرصيد المتبقي</td>
                </tr>
                <tr>
                    <td><span id="remainingTime">--</span></td>
                    <td>:الوقت المتبقي</td>
                </tr>
                <tr>
                    <td><span id="createdDate"></span></td>
                    <td>:تاريخ الإنشاء</td>
                </tr>
            </tbody>
        </table>

        <button onclick="openLogout()" type="button" style="    margin-left: 195px;" class="add-btn btn btn-outline-primary">تسجيل الخروج</button>
    </form>

    <?php include 'footer.php'; ?>

    <script>
        function openLogout() {
            open('/local/myotherporject/index.php');
            window.close();
            return false;
        }

        function readableData(kilobytes) {
            const units = ['KB', 'MB', 'GB'];
            let size = kilobytes;
            let unitIndex = 0;

            while (size >= 1000 && unitIndex < units.length - 1) {
                size = size / 1000;
                unitIndex++;
            }

            return size.toFixed(2) + ' ' + units[unitIndex];
        }

        function formatArabicDate(datetimeString) {
            const months = ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو',
                'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'
            ];
            const date = new Date(datetimeString);
            const day = date.getDate();
            const month = months[date.getMonth()];
            const year = date.getFullYear();
            let hours = date.getHours();
            const minutes = date.getMinutes().toString().padStart(2, '0');
            const period = hours >= 12 ? 'مساءً' : 'صباحًا';
            hours = (hours % 12) || 12;
            return `${day} ${month} ${year} - ${hours}:${minutes} ${period}`;
        }

        function toArabicBytes(kb) {
            const MB = 1024;
            const GB = 1024 * 1024;

            let size = kb;
            let unit = " كيلوبايت ";

            if (kb >= GB) {
                size = kb / GB;
                unit = " جيجابايت ";
            } else if (kb >= MB) {
                size = kb / MB;
                unit = " ميجابايت ";
            }

            return size.toFixed(2) + unit;
        }

        // Initial value
        let kb = <?= json_encode($sizeKB) ?>;

        // Detect if the page is PS.php
        const isPS = window.location.pathname.toLowerCase().includes("ps.php");

        // Function to update the text
        function updateDisplay() {
            document.getElementById("dataAmount").innerText = toArabicBytes(kb);
        }

        // Start displaying immediately
        updateDisplay();

        // Decrease every 1 minute if on PS.php
        if (isPS) {
            setInterval(() => {
                if (kb > 0) {
                    kb -= 0.5 * 1024; // Decrease 0.5 MB (i.e., 512 KB)
                    if (kb < 0) kb = 0; // Prevent negative size
                    updateDisplay();
                }
            }, 10000); // 60000 ms = 1 minute
        }


        const sizeKB = <?= json_encode($sizeKB) ?>;
        const createdTime = <?= json_encode($createdTime) ?>;

        document.getElementById("dataAmount").innerText = toArabicBytes(sizeKB);
        document.getElementById("createdDate").innerText = formatArabicDate(createdTime);

        // Optionally calculate remaining time
        function getRemainingTime() {
            const created = new Date(createdTime);
            const now = new Date();
            const diff = now - created; // in milliseconds

            const seconds = Math.floor(diff / 1000);
            const minutes = Math.floor(seconds / 60);
            const hours = Math.floor(minutes / 60);
            const days = Math.floor(hours / 24);

            const remaining = (days ? `${days} يوم ` : '') +
                (hours % 24 ? `${hours % 24} ساعة ` : '') +
                (minutes % 60 ? `${minutes % 60} دقيقة ` : '') +
                (seconds % 60 ? `${seconds % 60} ثانية ` : '');
            return remaining || 'الآن';
        }
        setInterval(() => {
            document.getElementById("remainingTime").innerText = getRemainingTime();
        }, 1000)
    </script>
</body>

</html>