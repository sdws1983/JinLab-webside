#!/usr/bin/env python2
# -*- coding: UTF-8 -*-

import os,time

# Create instance of FieldStorage

# Get data from fields
name = "1498792569.4789543"

command = "diamond blastx --db /copy1/a-reference/1-maize/1-cDNA/maize-pep-3.dmnd -q " + str(name) + " -k 1 -e 1e-5 -p 16 --sensitive -f 6"
out = os.popen(command).read()
#os.popen("rm " + str(name))

print ("Content-type:text/html\r\n\r\n")
print ("<html>")
print ("<head>")
print ("<title>Python CGI Program</title>")
print ("</head>")
print ("<body>")
print (out)
print ("</body>")
 
