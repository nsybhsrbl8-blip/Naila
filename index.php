<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>تركيز Tarkeez - الصفحة الرئيسية</title>

<link rel="stylesheet" href="style.css">
<script defer src="script.js"></script>

</head>

<body>

<!-- شريط التنقل -->
<nav class="navbar">
    <a href="index.php">الرئيسية</a>
    <?php if(isset($_SESSION['user'])): ?>
        <a href="logout.php">خروج</a>
    <?php else: ?>
        <a href="login.php">تسجيل الدخول</a>
    <?php endif; ?>
    <a href="contact.php">اتصل بنا</a>
</nav>

<div class="app">

<h1>تركيز Tarkeez</h1>
<p class="sub">تركيز = درجتك 🌳</p>

<div id="setup">

<input
id="subject"
placeholder="اكتبي اسم المادة... مثال: قواعد البيانات">

<button id="startBtn">
ابدأ جلسة تركيز 25 دقيقة
</button>

<div class="stats">

<div class="stat">
<b id="totalSessions">0</b>
جلسة
</div>

<div class="stat">
<b id="totalHours">0.0</b>
ساعة
</div>

</div>

</div>

<div id="session" class="hidden">

<div id="currentSubject" class="sub"></div>

<div id="timer" class="timer">
25:00
</div>

<div id="tree" class="tree">
🌱
</div>

<button id="stopBtn">
أنهيت الجلسة
</button>

<button id="cancelBtn" class="ghost">
إلغاء
</button>

<div id="alert" class="hidden">
⚠️ انتبهي! خرجتِ من الصفحة وستفقدين الجلسة.
</div>

</div>

<div id="report" class="hidden">

<h2>مبروك 🎉</h2>

<p>
أكملتِ جلسة
<b id="lastSubject"></b>
</p>

<div class="tree" style="font-size:100px">
🌳
</div>

<button id="againBtn">
جلسة جديدة
</button>

<button onclick="location.href='contact.php'">
تواصل معنا
</button>

</div>

</div>

</body>
</html>
