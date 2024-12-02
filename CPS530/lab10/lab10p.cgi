#!/usr/bin/env python
import cgi

form = cgi.FieldStorage()
city = form.getvalue("city", '').upper()
province = form.getvalue('province', '').upper()
country = form.getvalue('country', '').upper()
image_url = form.getvalue('image_url', '')

print "Content-Type: text/html\n"
print """
<!DOCTYPE html>
<html>
<head>
    <title>{city}, {country}</title>
</head>
<body style="text-align:center; background-color:lightcoral;">
    <h1 style="color:white; background-color:black;">{city}, {country}</h1>
    <img src="{image_url}" style="width:80%; border:10px solid black;">
</body>
</html>
""".format(city=city, country=country, image_url=image_url)
