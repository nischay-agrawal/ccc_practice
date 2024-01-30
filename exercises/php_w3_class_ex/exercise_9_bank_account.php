<?php 
    echo "<pre>";
    class BankAccount {
        private $accountNumber;
        private $accountHolder;
        private $balance;
        private $transactions;
        
        private function addTrasaction($amount)
        {
            $this->transactions[] = ['amount' => $amount, 'balance' => $this->balance];
        }

        public function __construct($accountNumber, $accountHolder, $initialBalance) {
            $this->accountNumber = $accountNumber;
            $this->accountHolder = $accountHolder;
            $this->balance = $initialBalance;
            $this->transactions=[];
            $this->addTrasaction($initialBalance);
        }
        
        public function deposit($amount) {
            $this->balance += $amount;
            $this->addTrasaction($amount);
        }

        public function withdraw($amount) {
            if ($amount <= $this->balance) {
                $this->balance -= $amount;
                $this->addTrasaction(-$amount);
            } else {
                echo "<u>Insufficient funds for withdrawal of $amount USD.</u><br>";
                $this->addTrasaction("Insufficient Funds:$amount");
            }
        }

        public function displayInfo() {
            echo "<br>Account Number: {$this->accountNumber},<br>Account Holder: {$this->accountHolder},<br>Balance: {$this->balance} USD";
        }

        public function displayTransactions() {
            echo "<br><br><b>Transactions:</b><br>";
            foreach ($this->transactions as $transaction) {
                echo "{$transaction['amount']} USD,\t Balance: {$transaction['balance']} USD<br>";
            }
        }
    }
    
    // Create a bank account object
    $account1 = new BankAccount("123456", "John Doe", 1000);
    
    // Deposit and withdraw from the account
    $account1->deposit(500);
    $account1->withdraw(500);
    $account1->withdraw(1000);
    $account1->withdraw(100);
    $account1->deposit(2000);
    $account1->withdraw(300);
    $account1->deposit(100);
    $account1->withdraw(500);
    $account1->deposit(400);
    $account1->withdraw(100);
    $account1->deposit(500);
    
    //Display account information
    $account1->displayInfo();
    //Display account transactions
    $account1->displayTransactions();
    
    echo "<br>------------------------------------------------------------------------<br>";
    
    $account2 = new BankAccount("654321", "Nischay Agrawal", 1000);
    $account2->deposit(500);
    $account2->withdraw(200);
    $account2->displayInfo();
    $account2->displayTransactions();
?>