const host = '52.15.161.48'
const port = 8083
const path = '/'
const h_username = "user"
const h_password = "1234567890"

const my_qos = 0
const clientId = Math.random().toString(36).substr(2, 10)

 function connect() {
  if (client && client.isConnected()) {
   return
  }
  client.connect({
	  userName: h_username,
    password: h_password,
   invocationContext: {
    foo: 'bar'
   },
   onSuccess: function onConnect(invocationContext) {
    console.log(`connected to: ${host}:${port}${path}`)
	client.subscribe("chat/nama", {qos: my_qos})
	client.subscribe("chat/pesan", {qos: my_qos})
   },
   onFailure: function onFailure(message) {
    console.log(`failed to connected: ${message.errorCode}\n${message.errorMessage}`)
    setTimeout(connect, 5000)
   }
  })
 }

 const client = new Paho.MQTT.Client(host, port, path, clientId)

 client.onConnectionLost = function onConnectionLost(message) {
  const code = message.errorCode
  const text = message.errorMessage
  console.log(`ERROR: ${code} ${text}`)
  setTimeout(connect, 3000)
 }
 
  client.onMessageArrived = function onMessageArrived(message) {
  const topic = message.destinationName
  const text = message.payloadString
  console.log(`--- Subsribed:  topic=${topic} text=${text}`)
  
  if(topic=="chat/nama")
  {
	document.getElementById("tbody_keluaran").innerHTML += "<tr><td><strong>"+text+" : </strong></td></tr>"
  }
  if(topic=="chat/pesan")
  {
	document.getElementById("tbody_keluaran").innerHTML += "<tr><td>"+text+"</td></tr>"
  }
  
 }
 
 function publish(my_topic, text) {
  if (!(client && client.isConnected())) {
   return console.log('not connected')
  }
  var message = new Paho.MQTT.Message(text)
  message.destinationName = my_topic
  message.qos = my_qos
  message.retained = false
  client.send(message)
  console.log('send:      topic=' + my_topic + ' text=' + text)
  
 }

 connect()

