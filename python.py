#!/usr/bin/python
# -*- coding: utf-8 -*-

import MySQLdb as mdb
import serial
import datetime

time = datetime.datetime.now()
time.strftime('%Y-%m-%d %H:%M:%S')
port = serial.Serial("/dev/ttyACM0", 9600)

while True:
	rcv = port.readline()
	#rcv = int(rcv)
	print "Tag detected:"+rcv
	if len(rcv) > -1:
		con = mdb.connect('localhost', 'testuser', 'test623', 'sudhin')
		with con:
			cur = con.cursor()
			cur.execute("INSERT INTO nrf (sl,data) VALUES (%s,%s);",(3,rcv) )
			#print "Tag detected:"+rcv
			con.commit()
		if con:    
			con.close()
