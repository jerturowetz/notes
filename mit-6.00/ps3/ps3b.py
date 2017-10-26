from ps3a import *
import time
from perm import *


#
#
# Problem #6A: Computer chooses a word
#
#
def comp_choose_word(hand, word_list):
    """
	Given a hand and a word_dict, find the word that gives the maximum value score, and return it.
   	This word should be calculated by considering all possible permutations of lengths 1 to HAND_SIZE.

    hand: dictionary (string -> int)
    word_list: list (string)
    """
    current_top_word = current_top_score = 0
    
    for n in range (1,HAND_SIZE+1):
        perms = get_perms(hand,n)
        
        for perm in perms:
            
            if perm in word_list and is_valid_word(perm,hand,word_list) and get_word_score(perm, HAND_SIZE) > current_top_score:
                current_top_word = perm
                current_top_score = get_word_score(perm, HAND_SIZE)
    
    return current_top_word



#
# Problem #6B: Computer plays a hand
#
def comp_play_hand(hand, word_list):
    """
     Allows the computer to play the given hand, as follows:

     * The hand is displayed.

     * The computer chooses a word using comp_choose_words(hand, word_dict).

     * After every valid word: the score for that word is displayed, 
       the remaining letters in the hand are displayed, and the computer 
       chooses another word.

     * The sum of the word scores is displayed when the hand finishes.

     * The hand finishes when the computer has exhausted its possible choices (i.e. comp_play_hand returns None).

     hand: dictionary (string -> int)
     word_list: list (string)
    """
    hand_score = 0
    hand_size = calculate_handlen(hand)
    while bool(hand):

        print 'current hand is: '
        display_hand(hand)
        print 'please be patient while computer is thinking'
        word = comp_choose_word(hand, word_list)

        if not bool(word):
            print
            print 'computer out of ideas'
            print 'total points for this hand: ', hand_score
            return hand_score
        else:
            print
            print 'computer plays: ', word

        if is_valid_word(word, hand, word_list):
            hand_score += get_word_score( word, hand_size )
            print
            print 'you scored ', get_word_score( word, hand_size ), ' points!'
            print 'your current score for this hand is: ', hand_score
            hand = update_hand(hand,word)

        else:
            print 'invalid word, try again!'

    print
    print 'no more letters available'
    print '  points for this hand: ', hand_score
    return hand_score


#
# Problem #6C: Playing a game
#
#
def play_game(word_list):
    """Allow the user to play an arbitrary number of hands.

    1) Asks the user to input 'n' or 'r' or 'e'.
    * If the user inputs 'n', play a new (random) hand.
    * If the user inputs 'r', play the last hand again.
    * If the user inputs 'e', exit the game.
    * If the user inputs anything else, ask them again.

    2) Ask the user to input a 'u' or a 'c'.
    * If the user inputs 'u', let the user play the game as before using play_hand.
    * If the user inputs 'c', let the computer play the game using comp_play_hand (created above).
    * If the user inputs anything else, ask them again.

    3) After the computer or user has played the hand, repeat from step 1

    word_list: list (string)
    """
    
    hand = total_score = hand_score = 0
    print
    print 'welcome to jers word game'
    print
    while True:
        print 'your current total score is: ', hand_score + total_score
        print
        print 'Choose an option:'
        print '  n) to play a new hand'
        print '  r) take the last hand over'
        print '  e) exit the game'
        print
        selection = raw_input().lower()
        
        if selection == 'e':
            print 'exiting game'
            print 'you earned ', total_score + hand_score, ' points'
            print 'thanks for playing!'
            print 
            return
            
        elif selection == 'r':
            if not bool(hand):
                print 'this is the first round, theres nothing to replay'
                print
                continue
            else:
                print 'disgarding last hand points + replaying'

        elif selection == 'n':
            print 'dealing new hand'
            total_score += hand_score
            hand = deal_hand(HAND_SIZE)
 
        print
        print 'Who\'s gonna play this hand? ("u" for user, "c" for computer)'
        while True:
            whos_playing = raw_input().lower()
            if whos_playing == 'u':
                print
                print '"u" selected, let\'s play this hand manually'
                hand_score = play_hand(hand,word_list)
                break
            elif whos_playing == 'c':
                print 
                print '"c" selected, computer will play this hand'
                hand_score = comp_play_hand(hand, word_list)
                break
            else:
                print 'please select a valid option'
                continue
#
# Build data structures used for entire session and play game
#
if __name__ == '__main__':
    word_list = load_words()
    play_game(word_list)
    