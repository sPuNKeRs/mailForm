<?php 
    /**
     * Класс для работы с отправкой сообщений EmailSender
     */
    
    class EmailSender {
        /**
         * Список адресатов для отправки
         * @var String
         */
        private $mail_to;

        /**
         * Тема письма
         * @var String
         */
        private $subject;

        /**
         * Сообщение
         * @var String
         */
        private $message;

        /**
         * Отправитель
         * @var String
         */
        private $from;

        /**
         * Дополнительные настройки
         * @var String
         */
        private $options;

        /**
         * Конструктор класса EmailSender
         * @param String $mail_to Адрес или список адресов для отправки
         */
        public function __construct($mail_to = null,
                                    $subject = null, 
                                    $message = null){
            $this->mail_to = $mail_to;
            $this->subject = $subject;
            $this->message = $message;

        }

        /**
         * Установить дополнительные настроки
         * @param String $options настройки
         */
        public function setOptions($options){
            $this->options = $options;
        }

        /**
         * Установить отправителя письма
         * @param String $from Адрес отправителя
         */
        public function setFromEmail($from){
            $this->from = $from;
        }

        /**
         * Установить тему сообщения
         * @param String $subject Тема сообщения
         */
        public function setSubject($subject = null){
            $this->subject = $subject;
        }

        /**
         * Установить тект сообщения
         * @param String $message Текст сообщения
         */
        public function setMessage($message){
            $this->message = $message;
        }

        /**
         * Вывести список адресатов
         * @return void 
         */
        public function showEmailList(){
            echo $this->mail_to;            
        }   
        

        /**
         * Добавить адресат или список адресатов, 
         * указанных через запятую
         * @param String $emailList Список адресов
         */
        public function addEmailTo($emailList){
           // Инициализация переменных         
           $emailArr = explode(',', $emailList);
           //var_dump($emailArr);
           foreach ($emailArr as $email) {
               $email = trim($email);
               if($this->checkEmailFormat($email)){
                   $this->mail_to .= ", ".$email;              
               }else{
                   echo "Неверный формат Email: ".$email."<br>";
               }
           }           
        }

        /**
         * Отправить сообщение
         * @return Bool Результат отправки сообщения
         */
        public function send(){
            // Инициализация переменных
            $check = true;
            if(!isset($this->mail_to)) $check = false;            
            if(!isset($this->subject)) $check = false;
            if(!isset($this->message)) $check = false;


            if($check){
                if(mail($this->mail_to, $this->subject, $this->message)){
                    echo "Сообщение успешно отправленно.";
                }else{
                    echo "Ошибка при отправке сообщения!";
                }
            }
        }

        /**
         * Проверка правильности формата электронной почты
         * @param   String $email Адрес электроной почты
         * @return Bool Результат проверки формата
         */
        private function checkEmailFormat($email){
           if(!preg_match("/^[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}$/i", $email)){
               return false;           
           }else{
               return true;
           }
        }

        public function __toString(){
            $email = "";

            $email .= "<p>Кому: {$this->mail_to}</p>";            
            $email .= "<p>Тема: {$this->subject}</p>";
            $email .= "<p>Сообщение:</p> <p>{$this->message}</p>";
            $email .= "<hr><p>Опции: {$this->options}</p>";

            return $email;
        }
    }
 ?>