
#include <Ethernet.h>
#include <SPI.h>

byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED }; // RESERVED MAC ADDRESS
EthernetClient client;

IPAddress ip();

long previousMillis = 0;
unsigned long currentMillis = 0;
long interval = 250000; // READING INTERVAL
int h=0;
int t=0;
long distancia;
long tiempo;
String data;

void setup() { 
	Serial.begin(2000);
        
Ethernet.begin(mac, ip) ;
Serial.print("server is at ");
Serial.println(Ethernet.localIP());
	
	delay(10000); // GIVE THE SENSOR SOME TIME TO START

	 
  pinMode(9, OUTPUT); /*activación del pin 9 como salida: para el pulso ultrasónico*/
  pinMode(8, INPUT); /*activación del pin 8 como entrada: tiempo del rebote del ultrasonido*/
}

void loop(){
       
	digitalWrite(9,LOW); /* Por cuestión de estabilización del sensor*/
        delayMicroseconds(5);
        digitalWrite(9, HIGH); /* envío del pulso ultrasónico*/
        delayMicroseconds(10);
        tiempo=pulseIn(8, HIGH); /* Función para medir la longitud del pulso entrante. Mide el tiempo que transcurrido entre el envío
        del pulso ultrasónico y cuando el sensor recibe el rebote, es decir: desde que el pin 12 empieza a recibir el rebote, HIGH, hasta que
        deja de hacerlo, LOW, la longitud del pulso entrante*/
        distancia= int(0.017*tiempo); /*fórmula para calcular la distancia obteniendo un valor entero*/
        /*Monitorización en centímetros por el monitor serial*/
        Serial.println("holaaaa"); 
        Serial.println("Distancia ");
        Serial.println(distancia);
        Serial.println(" cm");
        delay(1000);
                        
	Serial.println("holaaaa2"); 
	if (client.connect("localhost",80)) { // REPLACE WITH YOUR SERVER ADDRESS
		client.println("POST /add.php HTTP/1.1"); 
		client.println("Host: localhost"); // SERVER ADDRESS HERE TOO
		client.println("Content-Type: application/x-www-form-urlencoded"); 
		client.print("Content-Length: "); 
		client.print(distancia); 
                Serial.print(distancia); 
                Serial.println("holaaaa3");        
		client.println(distancia); 
		client.print(distancia); 
	} 

	if (client.connected()) { 
		client.stop();	// DISCONNECT FROM THE SERVER
	}

	delay(200); // WAIT FIVE MINUTES BEFORE SENDING AGAIN
}



