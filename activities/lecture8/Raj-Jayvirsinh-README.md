<!--- The following README.md sample file was adapted from https://gist.github.com/PurpleBooth/109311bb0361f32d87a2#file-readme-template-md by Gabriella Mosquera for academic use ---> 
<!--- You may delete any comments in this sample README.md file. If needing to use as a .txt file then simply delete all comments, edit as needed, and save as a README.txt file --->

# Activity 3 from Lecture 8

**[Optional]** Regular Expressions.

* *Date Created*: 01 OCT 2003
* *Last Modification Date*: 01 OCT 2003
<!-- * *Lab URL*: <http://example.com/> -->
* *Git URL*: <http://example.com/>

## Authors

**[Optional]** If what is being submitted is an individual Lab or Assignment, you may simply include your name and email address. Otherwise list the members of your group.

* [Jayvirsinh Raj](jayvir@dal.ca) - *(Student)*

## Regular Expressions - 1
* Home Address, should be non-case sensitive, allow for one, two, three, an four digits for a house number, and validate the following test cases: XXX Street Name, XXX Street St., XX Name Avenue, XX Name Ave.

** Regular expression:  ^\d{1,4}\s[A-Za-z\s]+$

** Test cases:

    *** 123 Street Name Street Address
    *** 123 Street St
    *** 21 Name Avenue
    *** 4223 Name Ave

## Regular Expressions - 2
* Phone number, should validate phone with their country code and/or their area code, such as: (XXX) XXX-XXXX, +X (XXX) XXX-XXXX

** Regular expression:  ^(?:\(\d{3}\)\s\d{3}-\d{4}|\+\d\s\(\d{3}\)\s\d{3}-\d{4}|\d{10})$

** Test cases:

    *** 1233212321
    *** +1 (123) 456-7890
    *** (123) 456-7890

## Regular Expressions - 2
* Last Name, be non-case sensitive and validate the following test cases: O'Donnell, Smith-Burns, Smith

** Regular expression:  ^[A-Za-z'-]+$

** Test cases: 

    *** 'Donnell
    *** Smith-Burns
    *** Smith