# Projects
Question #1 – Disemvowel Trolls
Trolls are attacking your comment section!
A common way to deal with this situation is to remove all of the vowels from the trolls’ comments, neutralizing the threat.
Your task is to write a function that takes a string argument and returns a new string with all vowels removed
Ans
import re
VOWELS_REGEX = r"[aeiouAEIOU]"
 
def disemvowel(string_):
    return re.sub(VOWELS_REGEX, "", string_)
 
if __name__ == '__main__':
    print(disemvowel("Programming With Mosh Rocks!"))
    
    
    
Question #2 – Find Valid Phone Number

Write a function that accepts a string and searches it for a valid phone number.

Return the phone number if found.

A valid phone number may be one of the following:
Ans
import re
def find_valid_phone(text):
    PHONE_REGEX = r'(\d{3}|\(\d{3}\))-\d{3}-\d{4}'
    phone = re.search(PHONE_REGEX, text)
 
    if phone != None:
        return phone.group()
 
if __name__ == '__main__':
    print(find_valid_phone('Call me at 415-555-1011 tomorrow.'))
    print(find_valid_phone('My number is (212)-543-2212 tomorrow.'))
    
    
Question #3 – Strong Password Detector

Write a function that employs regular expressions to ensure the password given to the function is strong.

A strong password is defined as follows:

        at least eight characters long
        contains one uppercase character
        contains one lowercase character
        has at least one digit
        has at least one special character
Ans
import re
 
def validate_password(password):
    # REGEX PATTERN THAT CHECKS PASSWORD HAS AT LEAST 8 CHARACTERS
    at_least_8 = r".{8,}"
    # REGEX PATTERN THAT CHECKS PASSWORD HAS 1 LOWERCASE
    one_lowercase = r"[a-z]"
    # REGEX PATTERN THAT CHECKS PASSWORD HAS 1 UPPERCASE
    one_uppercase = r"[A-Z]"
    # REGEX PATTERN THAT CHECKS PASSWORD HAS 1 DIGIT
    one_digit = r"\d"
    # REGEX PATTERN THAT CHECKS PASSWORD HAS 1 SPECIAL CHARACTER
    special_characters = r"!\”#$%&'()*+,-./:;<=>?@[\]^_`{|}~"
 
    if re.search(at_least_8, password) == None:
        print('Error: Password must have at least 8 characters')
        return False
    elif re.search(one_lowercase, password) == None:
        print('Error: Password must have at least 1 lowercase character')
        return False
    elif re.search(one_uppercase, password) == None:
        print('Error: Password must have at least 1 uppercase character')
        return False
    elif re.search(one_digit, password) == None:
        print('Error: Password must have at least 1 digit')
        return False
    elif re.search(special_characters, password) == None:
        print('Error: Password must have at least 1 special character')
        return False
 
    return True
 
if __name__ == '__main__':
    print(validate_password('pass'))
    print(validate_password('PASSWORD'))
    print(validate_password('password'))
    print(validate_password('Password'))
    print(validate_password('Password77'))
    print(validate_password('Password-77'))
    
  
 #Question
  Extracting email addresses using regular expressions in Python
  Ans
  # Python program to extract emails From 
# the String By Regular Expression. 
  
# Importing module required for regular 
# expressions 
import re 
  
# Example string 
s = """Hello from shubhamg199630@gmail.com
        to priya@yahoo.com about the meeting @2PM"""
  
# \S matches any non-whitespace character 
# @ for as in the Email 
# + for Repeats a character one or more times 
lst = re.findall('\S+@\S+', s)     
  
# Printing of List 
print(lst) 


#Question 
Regular Expression to Validate a Bitcoin Address
Ans
// C++ program to validate the
// BITCOIN Address using Regular
// Expression
#include <iostream>
#include <regex>
using namespace std;

// Function to validate the
// BTC address
bool isValidBTCAddress(string str)
{

	// Regex to check valid
	// BTc address.
	const regex pattern(
		"^(bc1|[13])[a-km-zA-HJ-NP-Z1-9]{25,34}$");

	// If the str Code
	// is empty return false
	if (str.empty()) {
		return false;
	}

	// Return true if the str
	// matched the ReGex
	if (regex_match(str, pattern)) {
		return true;
	}
	else {
		return false;
	}
}

string print(bool val)
{
	if (!val)
		return "False";

	return "True";
}

// Driver Code
int main()
{
	// Test Case 1:
	string str1 = "1RAHUEYstWetqabcFn5Au4m4GFg7xJaNVN2";
	cout << print(isValidBTCAddress(str1)) << endl;

	// Test Case 2:
	string str2 = "3J98t1RHT73CNmQwertyyWrnqRhWNLy";
	cout << print(isValidBTCAddress(str2)) << endl;

	// Test Case 3:
	string str3 = "bc1qarsrrr7ASHy5643ydab9re59gtzzwfrah";
	cout << print(isValidBTCAddress(str3)) << endl;

	// Test Case 4:
	string str4 = "b1qarsrrr7ASHy56439re59gtzzwfrah";
	cout << print(isValidBTCAddress(str4)) << endl;

	// Test Case 5:
	string str5 = "01qarsrrr7ASHy5643ydab9re59gtzzwfabc";
	cout << print(isValidBTCAddress(str5)) << endl;

	return 0;
}


#Question
Validating Bank Account Number Using Regular Expressions
Ans
// C++ program to validate the
// BANK ACCOUNT NUMBER using Regular
// Expression

#include <iostream>
#include <regex>
using namespace std;

// Function to validate the
//BANK ACCOUNT NUMBER(INDIA COUNTRY ONLY)
bool isValid_Bank_Acc_Number(string bank_account_number)
{

	// Regex to check valid
	// bank_account_number Code.
	const regex pattern("^[0-9]{9,18}$");

	// If the bank_account_number Code
	// is empty return false
	if (bank_account_number.empty()) {
		return false;
	}

	// Return true if the bank_account_number Code
	// matched the ReGex
	if (regex_match(bank_account_number, pattern))
	{
		return true;
	}
	else
	{
		return false;
	}
}

void print(bool value){
	
	cout<<"Is this account valid: ";
	
	if(value)
		cout<<"True"<<endl;
	else
		cout<<"False"<<endl;
}


// Driver Code
int main()
{
	// Test Case 1:
	string str1 = "635802010014976";
	print(isValid_Bank_Acc_Number(str1));

	// Test Case 2:
	string str2 = "9136812895_";
	print(isValid_Bank_Acc_Number(str2));

	// Test Case 3:
	string str3 = "BNZAA2318JM";
	print(isValid_Bank_Acc_Number(str3));

	// Test Case 4:
	string str4 = " 934517865";
	print(isValid_Bank_Acc_Number(str4));

	// Test Case 5:
	string str5 = "UBIN0563587";
	print(isValid_Bank_Acc_Number(str5));
	
	// Test Case 6:
	string str6 = "654294563";
	print(isValid_Bank_Acc_Number(str6));

	return 0;
}


#Question
Test rear digit match in all list elements
Ans
# Python3 code to demonstrate
# Test rear digit match
# using list comprehension + map()

# initializing list
test_list = [45, 545, 2345, 8765]

# printing original list
print("The original list : " + str(test_list))

# using list comprehension + map()
# Test rear digit match
res = len(set(sub[-1] for sub in map(str, test_list))) == 1

# print result
print("Does each element end with same digit ? " + str(res))


#Question
Find all the numbers in a string using regular expression in Python
Ans
# Python3 program to extract all the numbers from a string
import re

# Function to extract all the numbers from the given string
def getNumbers(str):
	array = re.findall(r'[0-9]+', str)
	return array

# Driver code
str = "adbv345hj43hvb42"
array = getNumbers(str)
print(*array)


#Question
# importing matplotlib module
from matplotlib import pyplot as plt

# x-axis values
x = [5, 2, 9, 4, 7]

# Y-axis values
y = [10, 5, 8, 4, 2]

# Function to plot
plt.plot(x,y)

# function to show the plot
plt.show()


#Question
Regular Dictionary vs Ordered Dictionary in Python
Ans
# A Python program to demonstrate
# the difference between regular
# and ordered dictionary.


import collections


# Creating a regular dictionary
print('Regular dictionary:')
d = {chr(k):k for k in range(ord('a'), ord('g'))}

for k, v in d.items():
	print(k, v)

# Creating an Ordered dictionary
print('\nOrderedDict:')
d = collections.OrderedDict()
[d.setdefault(chr(k), k) for k in range(ord('a'), ord('g'))]

for k, v in d.items():
	print(k, v)


#Question
Scraping And Finding Ordered Words In A Dictionary using Python
Ans
# Python program to find ordered words
import requests

# Scrapes the words from the URL below and stores
# them in a list
def getWords():

	# contains about 2500 words
	url = "http://www.puzzlers.org/pub/wordlists/unixdict.txt"
	fetchData = requests.get(url)

	# extracts the content of the webpage
	wordList = fetchData.content

	# decodes the UTF-8 encoded text and splits the
	# string to turn it into a list of words
	wordList = wordList.decode("utf-8").split()

	return wordList


# function to determine whether a word is ordered or not
def isOrdered():

	# fetching the wordList
	collection = getWords()

	# since the first few of the elements of the
	# dictionary are numbers, getting rid of those
	# numbers by slicing off the first 17 elements
	collection = collection[16:]
	word = ''

	for word in collection:
		result = 'Word is ordered'
		i = 0
		l = len(word) - 1

		if (len(word) < 3): # skips the 1 and 2 lettered strings
			continue

		# traverses through all characters of the word in pairs
		while i < l:		
			if (ord(word[i]) > ord(word[i+1])):
				result = 'Word is not ordered'
				break
			else:
				i += 1

		# only printing the ordered words
		if (result == 'Word is ordered'):
			print(word,': ',result)


# execute isOrdered() function
if __name__ == '__main__':
	isOrdered()



#Question
Program to print all distinct elements of a given integer array in Python | Ordered Dictionary
Ans
# Python program to print All Distinct
# Elements of a given integer array

from collections import OrderedDict

def printDistinct(input):
	# convert list into ordered dictionary
	ordDict = OrderedDict.fromkeys(input)

	# iterate through dictionary and get list of keys
	# list of keys will be resultant distinct elements
	# in array
	result = [ key for (key, value) in ordDict.items() ]

	# concatenate list of elements with ', ' and print
	print (', '.join(map(str, result)))

# Driver program
if __name__ == "__main__":
	input = [12, 10, 9, 45, 2, 10, 10, 45]
	printDistinct(input)

#Question
Python3 Program for Shortest Un-ordered Subarray
Answer
# Python3 program to find shortest
# subarray which is unsorted

# Bool function for checking an array
# elements are in increasing
def increasing(a, n):

	for i in range(0, n - 1):
		if (a[i] >= a[i + 1]):
			return False
			
	return True

# Bool function for checking an array
# elements are in decreasing
def decreasing(a, n):

	for i in range(0, n - 1):
		if (a[i] < a[i + 1]):
			return False
			
	return True

def shortestUnsorted(a, n):

	# increasing and decreasing are two functions.
	# if function return True value then print
	# 0 otherwise 3.
	if (increasing(a, n) == True or
		decreasing(a, n) == True):
		return 0
	else:
		return 3

# Driver code
ar = [7, 9, 10, 8, 11]
n = len(ar)
print(shortestUnsorted(ar, n))

# This code is contributed by Smitha Dinesh Semwal.

#Question
Python | Convert flattened dictionary into nested dictionary
Ans
# Python code to demonstrate
# conversion of flattened dictionary
# into nested dictionary


def insert(dct, lst):
	for x in lst[:-2]:
		dct[x] = dct = dct.get(x, dict())
	dct.update({lst[-2]: lst[-1]})
	

def convert_nested(dct):
	# empty dict to store the result
	result = dict()

	# create an iterator of lists
	# representing nested or hierarchical flow
	lists = ([*k.split("_"), v] for k, v in dct.items())

	# insert each list into the result
	for lst in lists:
		insert(result, lst)
	return result
		
# initialising_dictionary
ini_dict = {'Geeks_for_for':1,'Geeks_for_geeks':4,
			'for_geeks_Geeks':3,'geeks_Geeks_for':7}

# printing initial dictionary
print ("initial_dictionary", str(ini_dict))

# code to convert ini_dict to nested
# dictionary splitting_dict_keys
_split_dict = [[*a.split('_'), b] for a, b in ini_dict.items()]


# printing final dictionary
print ("final_dictionary", str(convert_nested(ini_dict)))




#Exception Handling
# Program to handle multiple errors with one
# except statement
# Python 3

def fun(a):
	if a < 4:

		# throws ZeroDivisionError for a = 3
		b = a/(a-3)

	# throws NameError if a >= 4
	print("Value of b = ", b)
	
try:
	fun(3)
	fun(5)

# note that braces () are necessary here for
# multiple exceptions
except ZeroDivisionError:
	print("ZeroDivisionError Occurred and Handled")
except NameError:
	print("NameError Occurred and Handled")



# Program to depict else clause with try-except
# Python 3
# Function which returns a/b
def AbyB(a , b):
	try:
		c = ((a+b) / (a-b))
	except ZeroDivisionError:
		print ("a/b result in 0")
	else:
		print (c)

# Driver program to test above function
AbyB(2.0, 3.0)
AbyB(3.0, 3.0)



ArithmeticError -	Raised when an error occurs in numeric calculations
AssertionError -	Raised when an assert statement fails
AttributeError -	Raised when attribute reference or assignment fails
Exception -	Base class for all exceptions
EOFError -	Raised when the input() method hits an "end of file" condition (EOF)
FloatingPointError -	Raised when a floating point calculation fails
GeneratorExit -	Raised when a generator is closed (with the close() method)
ImportError -	Raised when an imported module does not exist
IndentationError -	Raised when indentation is not correct
IndexError -	Raised when an index of a sequence does not exist
KeyError -	Raised when a key does not exist in a dictionary
KeyboardInterrupt -	Raised when the user presses Ctrl+c, Ctrl+z or Delete
LookupError -	Raised when errors raised cant be found
MemoryError -	Raised when a program runs out of memory
NameError -	Raised when a variable does not exist
NotImplementedError -	Raised when an abstract method requires an inherited class to override the method
OSError -	Raised when a system related operation causes an error
OverflowError 	Raised when the result of a numeric calculation is too large
ReferenceError -	Raised when a weak reference object does not exist
RuntimeError -	Raised when an error occurs that do not belong to any specific exceptions
StopIteration -	Raised when the next() method of an iterator has no further values
SyntaxError -	Raised when a syntax error occurs
TabError -	Raised when indentation consists of tabs or spaces
SystemError -	Raised when a system error occurs
SystemExit -	Raised when the sys.exit() function is called
TypeError -	Raised when two different types are combined
UnboundLocalError -	Raised when a local variable is referenced before assignment
UnicodeError -	Raised when a unicode problem occurs
UnicodeEncodeError -	Raised when a unicode encoding problem occurs
UnicodeDecodeError -	Raised when a unicode decoding problem occurs
UnicodeTranslateError -	Raised when a unicode translation problem occurs
ValueError -	Raised when there is a wrong value in a specified data type
ZeroDivisionError -	Raised when the second operator in a division is zero


#
Python Program to Find Duplicate sets in list of sets
Ans
# Python3 code to demonstrate working of
# Duplicate sets in list of sets
# Using Counter() + count() + frozenset() + loop
from collections import Counter

# initializing list
test_list = [{4, 5, 6, 1}, {6, 4, 1, 5}, {1, 3, 4, 3},
			{1, 4, 3}, {7, 8, 9}]
			
# printing original list
print("The original list is : " + str(test_list))

# getting frequency using Counter()
freqs = Counter(frozenset(sub) for sub in test_list)

res = []
for key, val in freqs.items():
	
	# if frequency greater than 1, set is appended
	# [duplicate]
	if val > 1 :
		res.append(key)

# printing result
print("Duplicate sets list : " + str(res))

#
Python program to count number of vowels using sets in given string
Ans
# Python3 code to count vowel in
# a string using set

# Function to count vowel
def vowel_count(str):
	
	# Initializing count variable to 0
	count = 0
	
	# Creating a set of vowels
	vowel = set("aeiouAEIOU")
	
	# Loop to traverse the alphabet
	# in the given string
	for alphabet in str:
	
		# If alphabet is present
		# in set vowel
		if alphabet in vowel:
			count = count + 1
	
	print("No. of vowels :", count)
	
# Driver code
str = "GeeksforGeeks"

# Function Call
vowel_count(str)

#
Python Set | Pairs of complete strings in two sets
Ans
# Function to find pairs of complete strings
# in two sets of strings

def completePair(set1,set2):
	
	# consider all pairs of string from
	# set1 and set2
	count = 0
	for str1 in set1:
		for str2 in set2:
			result = str1 + str2

			# push all alphabets of concatenated
			# string into temporary set
			tmpSet = set([ch for ch in result if (ord(ch)>=ord('a') and ord(ch)<=ord('z'))])
			if len(tmpSet)==26:
				count = count + 1
	print (count)

# Driver program
if __name__ == "__main__":
	set1 = ['abcdefgh', 'geeksforgeeks','lmnopqrst', 'abc']
	set2 = ['ijklmnopqrstuvwxyz', 'abcdefghijklmnopqrstuvwxyz','defghijklmnopqrstuvwxyz']
	completePair(set1,set2)


#
Python program to find common elements in three lists using sets
Ans
# Python3 program to find common elements
# in three lists using sets

def IntersecOfSets(arr1, arr2, arr3):
	# Converting the arrays into sets
	s1 = set(arr1)
	s2 = set(arr2)
	s3 = set(arr3)
	
	# Calculates intersection of
	# sets on s1 and s2
	set1 = s1.intersection(s2)		 #[80, 20, 100]
	
	# Calculates intersection of sets
	# on set1 and s3
	result_set = set1.intersection(s3)
	
	# Converts resulting set to list
	final_list = list(result_set)
	print(final_list)

# Driver Code
if __name__ == '__main__' :
	
	# Elements in Array1
	arr1 = [1, 5, 10, 20, 40, 80, 100]
	
	# Elements in Array2
	arr2 = [6, 7, 20, 80, 100]
	
	# Elements in Array3
	arr3 = [3, 4, 15, 20, 30, 70, 80, 120]
	
	# Calling Function
	IntersecOfSets(arr1, arr2, arr3)
