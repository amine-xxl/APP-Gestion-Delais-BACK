Set oShell = CreateObject("Wscript.Shell")

' ⚠️ Update ALL paths below to match your local environment
' Example:
' C:\path\to\xampp           → your XAMPP installation folder
' C:\path\to\php             → your PHP folder
' C:\path\to\your\project    → your project root folder

' Start MySQL silently
oShell.Run "cmd /c start """" /b C:\path\to\xampp\mysql_start.bat", 0, False
WScript.Sleep 5000

' Start Laravel (PHP built-in server)
oShell.Run "cmd /c start """" /b C:\path\to\php\php.exe -S localhost:8000 -t ""C:\path\to\your\project\BackEnd\public""", 0, False
WScript.Sleep 7000

' Open browser
oShell.Run "http://localhost:8000", 1, False