#!/usr/bin/python

import urllib
import sys
import json
import os
import socket
import commands
import hmac
import hashlib

def httpCall(command):
	return commands.getstatusoutput(command)[1]

def hmacSignature(tauth_token_secret, param_str):
	h = hmac.new(tauth_token_secret, param_str, hashlib.sha1)
	s = h.digest()
	return s.encode('base64').rstrip()

def createAuthHeader(token, param, sign):
	m={'token':token,'param':param, 'sign':sign}
	arr=urllib.urlencode(m).split('&')
	authorizationHeader="Authorization:TAuth2 "  
	for value in arr:
		pair=value.split("=")
		authorizationHeader+=pair[0] + "=\"" + pair[1] + "\","

	return authorizationHeader[0: len(authorizationHeader) - 1]

if __name__ == '__main__':
	if (len(sys.argv) < 4):
		print "demo: tool.py $token $secret_token $uid"
		sys.exit()

	tauth_token=sys.argv[1]
	tauth_token_secret=sys.argv[2]
	uid=sys.argv[3]
	
	sign=hmacSignature(tauth_token_secret, "uid=" + uid);
	header=createAuthHeader(tauth_token, "uid="+uid, sign)
	print header


