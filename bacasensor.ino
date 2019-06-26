#include "DHT.h"
#define DHTTYPE DHT11   // DHT 22  (AM2302), AM2321
#include <ESP8266WiFi.h>
#include <WiFiClient.h>

// DHT Sensor
uint8_t DHTPin = 2; 

const char* ssid = "MyHost";
const char* password = "myhostku";
const char* host = "192.168.43.118";
byte mac[6];

WiFiServer server(80);
IPAddress ip(192, 168, 43, 118);
IPAddress gateway(192, 168, 43, 1);
IPAddress subnet(255, 255, 255, 0);
               
// Initialize DHT sensor.
DHT dht(DHTPin, DHTTYPE);                

float Temperature;
float Humidity;
 
void setup() {
  Serial.begin(9600);
  delay(100);
  pinMode(DHTPin, INPUT);
  dht.begin();
}

void loop() {
  Temperature = dht.readTemperature(); // Gets the values of the temperature
  Humidity = dht.readHumidity(); // Gets the values of the humidity   

  Serial.print("Temp:"); Serial.print(Temperature); Serial.print(" | Humidity : "); Serial.println(Humidity);

   delay(1000);

  WiFiClient client;
  Serial.printf("\n[Connecting to rumah_jamur", host);
   
  if (client.connect(host, 80))
  {
    Serial.println("Connected");
    client.println("GET /iot/uas/index_api.php?temp=");
    client.println("&humadity=");
    client.println("Host: 192.168.43.118");
    client.println("DHT");
    Serial.println("\n[Disconnected]");
  }
  else
  {
    Serial.println("connection failed!]");
    client.stop();
  }
  
}
