#!/usr/bin/env python2
# -*- coding: UTF-8 -*-

import cgi, cgitb
import os,time

# Create instance of FieldStorage
form = cgi.FieldStorage()

# Get data from fields
if form.getvalue('textcontent'):
   text_content = form.getvalue('textcontent')
else:
   text_content = "Not entered"

if form.getvalue('species'):
   blasttype = form.getvalue('species')
else:
   blasttype = "提交数据为空"
if form.getvalue('num'):
   num = form.getvalue('num')

if form.getvalue('evalue'):
   evalue = form.getvalue('evalue')

name = time.time()
f = open(str(name), 'w')
f.write(text_content)
f.close()
name = str(name)
if blasttype == "b73":
   command = "blastn -query " + str(name) + " -db /copy1/a-reference/1-maize/7-v4-genome/Zea_mays.AGPv4.cds.all.fa -evalue " + evalue + ' -num_threads 16 -outfmt "6 qseqid sseqid pident length mismatch gapopen qstart qend sstart send evalue bitscore qseq sseq" -num_alignments ' + num + " -out " + str(name) + ".out"
if blasttype == "mo17":
   command = "blastn -query " + str(name) + " -db /copy1/a-reference/1-maize/x-other-genomes/0-Mo17/Mo17.final.cds.fa -evalue " + evalue + ' -num_threads 16 -outfmt "6 qseqid sseqid pident length mismatch gapopen qstart qend sstart send evalue bitscore qseq sseq" -num_alignments ' + num + " -out " + str(name) + ".out"
if blasttype == "mo17_genomic":
   command = "blastn -query " + str(name) + " -db /copy1/a-reference/1-maize/x-other-genomes/0-Mo17/Mo17_pseudo.fa -evalue " + evalue + ' -num_threads 16 -outfmt "6 qseqid sseqid pident length mismatch gapopen qstart qend sstart send evalue bitscore qseq sseq" -num_alignments ' + num + " -out " + str(name) + ".out"
if blasttype == "w22_genomic":
   command = "blastn -query " + str(name) + " -db /copy1/a-reference/1-maize/x-other-genomes/0-W22/Zm-W22-REFERENCE-NRGENE-2.0.fasta -evalue " + evalue + ' -num_threads 16 -outfmt "6 qseqid sseqid pident length mismatch gapopen qstart qend sstart send evalue bitscore qseq sseq" -num_alignments ' + num + " -out " + str(name) + ".out"
if blasttype == "w22":
   command = "blastn -query " + str(name) + " -db /copy1/a-reference/1-maize/x-other-genomes/0-W22/Zm-W22-CDS-NRGENE-2.0.fasta -evalue " + evalue + ' -num_threads 16 -outfmt "6 qseqid sseqid pident length mismatch gapopen qstart qend sstart send evalue bitscore qseq sseq" -num_alignments ' + num + " -out " + str(name) + ".out"
if blasttype == "HZ4_genomic":
   command = "blastn -query " + str(name) + " -db /copy1/a-reference/1-maize/x-other-genomes/6-Huangzao4/GWHAAJX00000000 -evalue " + evalue + ' -num_threads 16 -outfmt "6 qseqid sseqid pident length mismatch gapopen qstart qend sstart send evalue bitscore qseq sseq" -num_alignments ' + num + " -out " + str(name) + ".out"

if blasttype == "coix_contig":
   command = "blastn -query " + str(name) + " -db /copy1/a-reference/coix/BJCoxi_reference.V1.fasta -evalue " + evalue + ' -num_threads 16 -outfmt "6 qseqid sseqid pident length mismatch gapopen qstart qend sstart send evalue bitscore qseq sseq" -num_alignments ' + num + " -out " + str(name) + ".out"
if blasttype == "Sorghum":
   command = "blastn -query " + str(name) + " -db /copy1/a-reference/9-other-speices/5-Sorghum_bicolor/sorghum.fa -evalue " + evalue + ' -num_threads 16 -outfmt "6 qseqid sseqid pident length mismatch gapopen qstart qend sstart send evalue bitscore qseq sseq" -num_alignments ' + num + " -out " + str(name) + ".out"

#command = "wc -l *"
os.system(command)
out = open(str(name) + ".out", 'r').read().split("\n")
os.system("rm " + str(name))
os.system("rm " + str(name) + ".out")


print ("Content-type:text/html\r\n\r\n")
print ("<html>")
print ("<head>")
print ("<title>blast result</title>")
print ('<link rel="stylesheet"   href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">')
print ('<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">')
print ('<script src="https://code.jquery.com/jquery.js"></script>')
print ('<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>')
print ('<style type="text/css">')
print ('body{font-size:70%;font-family:Microsoft YaHei, Tahoma, Helvetica, Arial, sans-serif;}')
print ('</style>')
print ("</head>")
print ("<body>")
print ('<div class="container">')
print ('<div class="row clearfix">')
print ('<div class="col-md-12 column">')
print ('<div class="page-header">')
print ('<h2>Blast results</h2>')
#print ('<p><a class="btn btn-default btn-xs" role="button" href="/cgi-bin/' + str(name) + ".out" + '">Download results</a></p>')
print ('<p><a class="btn btn-default btn-xs" role="button" href="/cgi-bin/' + str(name) + ".out" + '">' + command + '</a></p>')
print ('</div>')
print ('<table class="table table-hover table-condensed table-striped" style="font-size:10px">')
print ('<thead>')
print ('<tr>')
print ('<th>qseqid</th><th>sseqid</th><th>pident</th><th>length</th><th>mismatch</th><th>gapopen</th><th>qstart</th><th>qend</th><th>sstart</th><th>send</th><th>evalue</th><th>bitscore</th><th>qseq</th><th>sseq</th>')
print ('</tr>')
print ('</thead>')
print ('<tbody>')
nn = 0
for i in out[:-1]:
	i = i.split('\t')
	print ('<tr>')
	for each in i[:-2]:
		print ('<td>' + each + '</td>')
	for e in i[-2:-1]:
		print ('<td><button type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-target="#demoA' + str(nn) + '">View details</button><div id="demoA' + str(nn) + '" class="collapse">' + e + '</div></td>')
	for d in i[-1:]:
		print ('<td><button type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-target="#demoB' + str(nn) + '">View details</button><div id="demoB' + str(nn) + '" class="collapse">' + d + '</div></td>')
	print ('</tr>')
	nn+=1
print ('</tbody>')
print ('</table>')
print ("<p>" + out + "</p>")
print (blasttype)
#print (os.popen(command))
print ("</body>")
 
