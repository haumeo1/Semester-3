<% 
' Get the background color from the query string
dim bgColor
bgColor = Request.QueryString("color")

' Set default background color if none provided
if bgColor = "" then bgColor = "white"

' Handle cookies for last visit
dim lastVisit
if Request.Cookies("LastVisit") <> "" then
    lastVisit = "Your last visit was on: " & Request.Cookies("LastVisit")
else
    lastVisit = "This is your first visit!"
end if

' Update the last visit cookie
Response.Cookies("LastVisit") = Now()
Response.Cookies("LastVisit").Expires = DateAdd("d", 30, Now())
%>
<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Background</title>
</head>
<body style="background-color:<%=bgColor%>;">
    <h1>Welcome to the ASP Dynamic Background Page</h1>
    <p><%=lastVisit%></p>
</body>
</html>
