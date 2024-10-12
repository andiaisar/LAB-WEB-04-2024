// Konstanta dan variabel global
const suits = ['♠', '♥', '♦', '♣'];
const values = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];
let deck = [];
let playerHand = [];
let BandarHand = [];
let playerScore = 0;
let BandarScore = 0;
let money = 5000;
let bet = 100;
let gameState = 'betting';
let playerWins = 0;
let BandarWins = 0;

// Fungsi utilitas
function createDeck() {
    deck = [];
    for (let suit of suits) {
        for (let value of values) {
            deck.push({ suit, value });
        }
    }
    shuffleDeck();
}

function shuffleDeck() {
    for (let i = deck.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [deck[i], deck[j]] = [deck[j], deck[i]];
    }
}

function drawCard() {
    return deck.pop();
}

function calculateScore(hand) {
    let score = 0;
    let aces = 0;
    for (let card of hand) {
        if (card.value === 'A') {
            aces += 1;
            score += 11;
        } else if (['K', 'Q', 'J'].includes(card.value)) {
            score += 10;
        } else {
            score += parseInt(card.value);
        }
    }
    while (score > 21 && aces > 0) {
        score -= 10;
        aces -= 1;
    }
    return score;
}

// Fungsi permainan
function startNewGame() {
    document.getElementById('message').textContent = '';
    document.getElementById('Bandar-area').classList.add('hidden');
    document.getElementById('player-area').classList.add('hidden');
    
    if (money <= 0) {
        document.getElementById('game-over').classList.remove('hidden');
        return;
    }
    createDeck();
    playerHand = [];
    BandarHand = [];
    playerScore = 0;
    BandarScore = 0;
    gameState = 'betting';
    updateUI();
}

function placeBet() {
    bet = parseInt(document.getElementById('bet-amount').value);
    if (bet < 100 || bet > money) {
        alert('Jumlah taruhan tidak valid!');
        return;
    }
    money -= bet;
    dealInitialCards();
}

function dealInitialCards() {
    // Tampilkan kotak Bandar dan Pemain setelah taruhan dipasang
    document.getElementById('Bandar-area').classList.remove('hidden');
    document.getElementById('player-area').classList.remove('hidden');

    playerHand = [drawCard(), drawCard()];
    BandarHand = [drawCard(), drawCard()];
    playerScore = calculateScore(playerHand);
    BandarScore = calculateScore([BandarHand[0]]);
    gameState = 'player-turn';
    updateUI();
    checkForBlackjack();
}

function checkForBlackjack() {
    if (playerScore === 21) {
        gameState = 'Bandar-turn';
        BandarPlay();
    }
}

function hit() {
    playerHand.push(drawCard());
    playerScore = calculateScore(playerHand);
    if (playerScore > 21) {
        gameState = 'game-over';
        updateUI();
        endGame('Bust! Anda kalah!');
    } else if (playerScore === 21) {
        gameState = 'Bandar-turn';
        BandarPlay();
    }
    updateUI();
}

function stand() {
    gameState = 'Bandar-turn';
    BandarPlay();
}

function BandarPlay() {
    BandarScore = calculateScore(BandarHand);
    while (BandarScore < 17) {
        BandarHand.push(drawCard());
        BandarScore = calculateScore(BandarHand);
    }
    determineWinner(); 
}


function endGame(message) {
    gameState = 'game-over'; 
    document.getElementById('message').textContent = message;
    updateUI(); 
    console.log(message);
    
    setTimeout(function () {
        document.getElementById('Bandar-area').classList.add('hidden');
        document.getElementById('player-area').classList.add('hidden');
    }, 5000);  
}

function determineWinner() {
    if (BandarScore > 21 || playerScore > BandarScore) {
        money += bet * 2;
        endGame('Anda menang!');
    } else if (BandarScore > playerScore) {
        endGame('Bandar menang!');
    } else {
        money += bet;
        endGame('Seri!');
    }
}


// Fungsi UI
function updateUI() {
    document.getElementById('money').textContent = money;
    document.getElementById('betting-area').style.display = gameState === 'betting' ? 'block' : 'none';
    document.getElementById('actions').style.display = gameState === 'player-turn' ? 'block' : 'none';
    document.getElementById('new-game').style.display = gameState === 'game-over' ? 'block' : 'none';
    updateHand('player', playerHand, playerScore);
    updateHand('Bandar', BandarHand, BandarScore, gameState === 'player-turn');


    // Update skor menang
    document.getElementById('player-wins').textContent = playerWins;
    document.getElementById('Bandar-wins').textContent = BandarWins;
}

function updateHand(player, hand, score, hideSecondCard = false) {
    const cardContainer = document.getElementById(`${player}-cards`);
    cardContainer.innerHTML = '';
    hand.forEach((card, index) => {
        const cardElement = document.createElement('div');
        cardElement.className = 'card';

        if (!(hideSecondCard && index === 1)) {
            cardElement.classList.add('card-front');
            const cardImage = document.createElement('img');
            cardImage.src = getCardImageUrl(card);
            cardElement.appendChild(cardImage);
        }

        cardContainer.appendChild(cardElement);
    });
    document.getElementById(`${player}-score`).textContent = hideSecondCard ? '?' : score;
}

function getCardImageUrl(card) {
    const valueMap = {
        'A': 'A',
        'K': 'K',
        'Q': 'Q',
        'J': 'J',
        '10': '0'  
    };
    const suitMap = {
        '♠': 'S',  // Spades
        '♥': 'H',  // Hearts
        '♦': 'D',  // Diamonds
        '♣': 'C'   // Clubs
    };

    const value = valueMap[card.value] || card.value;
    const suit = suitMap[card.suit];

    return `https://deckofcardsapi.com/static/img/${value}${suit}.png`;
}

// Event listeners
document.getElementById('place-bet').addEventListener('click', placeBet);
document.getElementById('hit').addEventListener('click', hit);
document.getElementById('stand').addEventListener('click', stand);
document.getElementById('new-game').addEventListener('click', startNewGame);
document.getElementById('restart-game').addEventListener('click', () => {
    money = 5000;
    playerWins = 0;
    BandarWins = 0;
    document.getElementById('game-over').classList.add('hidden');
    startNewGame();
});

// Inisialisasi permainan
startNewGame();
