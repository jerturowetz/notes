# 6.00 Problem Set 3
# 
# Hangman
#


# -----------------------------------
# Helper code
# (you don't need to understand this helper code)
import random
import string

WORDLIST_FILENAME = "words.txt"

def load_words():
    """
    Returns a list of valid words. Words are strings of lowercase letters.
    
    Depending on the size of the word list, this function may
    take a while to finish.
    """
    print "Loading word list from file..."
    # inFile: file
    inFile = open(WORDLIST_FILENAME, 'r', 0)
    # line: string
    line = inFile.readline()
    # wordlist: list of strings
    wordlist = string.split(line)
    print "  ", len(wordlist), "words loaded."
    print
    return wordlist

def choose_word(wordlist):
    """
    wordlist (list): list of words (strings)

    Returns a word from wordlist at random
    """
    return random.choice(wordlist)

# end of helper code
# -----------------------------------

# actually load the dictionary of words and point to it with 
# the wordlist variable so that it can be accessed from anywhere
# in the program
wordlist = load_words()

# your code begins here!

def pick_a_letter():
	'''
	gets a letter (string) from the user converts it to lowercase and returns it if it hasnt already been guessed
	
	will repeat until only a single letter is entered
	'''
	while True:
		guess = raw_input("Make a guess: ")
		guess = guess.lower()
		if len(guess) == 1:
			break
		else:
			print "Error: please enter a single letter."
	return guess


def make_a_guess(tuple_of_guesses):
	while True:
		output = None
		guess = pick_a_letter()
		if guess in tuple_of_guesses:
			print 'You\'ve already played this letter. please try again.'
			print
		else:
			# guess is unique
			good_guess = guess
			tuple_of_guesses = tuple_of_guesses + (guess,)
			break
			
	return (good_guess,tuple_of_guesses)


def update_answer(word,old_answer,guess):
	'''
	iterates through a word (string) checking for a specific guess (string), when found, it converts the placeholder from answer (string) to the corresponding 
	'''
	new_answer = ''
	for x in range(0,len(old_answer)) :
		if guess == word[x]:
			new_answer = new_answer + guess
		else:
			new_answer = new_answer + old_answer[x]
			
	return new_answer


def add_spaces_between_letters(word):
	word_with_spaces = ''
	for letter in word:
		word_with_spaces = word_with_spaces + letter + ' '
	return word_with_spaces.strip()


def play_hangman(wordlist):
	word = choose_word(wordlist)
	chances = len(word) + 4
	answer = ''
	tuple_of_guesses = ()
	for x in range(0,len(word)) :
		answer = answer + '_'
	print 'Welcome to hangman'
	print 'A word has been chosen at random'
	print

	while answer != word:
		
		if chances == 0:
			print 'sorry, you\'re out of chances.'
			print '---------'
			print 'GAME OVER'
			print '---------'
			print
			break
			
		else:
			returned_guess = make_a_guess(tuple_of_guesses)
			guess = returned_guess[0]
			tuple_of_guesses = returned_guess[1]
			chances -= 1
			if guess in word:
				print 'way to go, you guessed right!'
				answer = update_answer(word,answer,guess)
			else:
				print 'sorry, that letter aint in there'
				
		print "You have ", chances, " chances left"
		print
		print add_spaces_between_letters(answer)
		print 'letters already played: ', tuple_of_guesses
		print 
		

	if answer == word:
		print '--------'
		print 'YOU WIN!'
		print '--------'

play_hangman(wordlist)
