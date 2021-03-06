<?php

class Scalr_Messaging_Service_ControlQueueHandler implements Scalr_Messaging_Service_QueueHandler
{

    /**
     * @var \ADODB_mysqli
     */
    private $db;

    private $logger;

    function __construct()
    {
        $this->db = \Scalr::getDb();
        $this->logger = \Scalr::getContainer()->logger(__CLASS__);
    }

    function accept($queue) {
        return $queue == "control";
    }

    function handle($queue, Scalr_Messaging_Msg $message, $rawMessage, $type = 'xml') {
        $this->logger->info(sprintf("Received message '%s' from server '%s'",
                $message->getName(), $message->getServerId()));
        try {
            $this->db->Execute("INSERT INTO messages SET
                messageid = ?,
                message = ?,
                server_id = ?,
                dtadded = NOW(),
                type = ?,
                ipaddress = ?,
                message_name = ?,
                message_format = ?
            ", array(
                $message->messageId,
                $rawMessage,
                $message->getServerId(),
                "in",
                $_SERVER['REMOTE_ADDR'],
                $message->getName(),
                $type
            ));
        } catch (Exception $e) {
            // Message may be already delivered.
            // urlopen issue on scalarizr side:
            // QueryEnvError: <urlopen error [Errno 4] Interrupted system call>
            if (strpos($e->getMessage(), 'Duplicate entry') === false) {
                throw $e;
            }
        }
    }
}