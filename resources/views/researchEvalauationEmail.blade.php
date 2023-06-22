<!DOCTYPE html>
<html>
<head>
    <title>عمادة البحث العلمي-جامعة غزة</title>
</head>
<body>
<h1>{{ $details['title'] }}</h1>
<p>السيد الدكتور /{{ $details['username'] }}</p>
<p>تتشرف عمادة الدراسات العليا والبحث العلمي غي جامعة غزة أن ترسل لكم البحث المرفق بعنوان :</p>
<b style="text-align: center;"> {{$details['res_title']}}</b>
<p>لتحكيمه من أجل نشره في العدد اللاحق من مجلة الجامعة العلمية المحكمة</p>
<b>رابط الدخول للمجلة:{{$details['url']}}</b>
<b>  إسم المستخدم:{{$details['to']}}</b>
<b>   كلمة المرور:{{$details['password']}}</b>
<p style="text-align: center;">وتفضلوا بقبول فائق الشكر والتقدير  </p>
<p style="text-align: left;">رئيس تحرير مجلة جامعة غزة للدراسات و الأبحاث المحكمة  </p>
<p style="text-align: left;">د. سهام أبو العمرين  </p>
</body>
</html>
