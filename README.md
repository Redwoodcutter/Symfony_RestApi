# Symfony_RestApi

 exact code degildir. 

- Yeni sipariş oluşturma (orderCode, productid, quantity, address, shippingDate)// Eksik Oluşum
<br>
OrdersController altındaki Add fonksiyonu ile Json değişkenlerin gönderilmesiyle şipariş ekleme mantıgını eklemek istedim. fakat bu JWT ve Login işlemi olmadı için Public olarak herkes tarafından yapilabiliyor. JWT'kısmını adapte etmeye "ManyToOne" ve "OneToMany" ilişkilendirmesini yapmaya çalişirken çalışma düzeni bozulmuştur. Detaylı ilerlemeyi Commitler üzerinden erişebilirsiniz.
http://127.0.0.1:8000/order/add
<br>
- Sipariş detayını görme 
Tüm Siparişler User tablosu eklenemediği için request User::id kısmıyla eşleşmiyor. Login içeriği eklenmeye çalışılmadan önce atılan request ile görüntülenebiliyor idi.
http://127.0.0.1:8000/order 
<br>
- Tüm siparişlerini listeleme
Bu kısımda compnayId kullanarak DB verilerini bağlamak ve örneğin http://127.0.0.1:8000/orders_post isteği gönderildiğinde ilgili JWT logini kuruldugunda siparişlerin listelenmesini istemiştim.
<br>
- Siparişi güncelleme (shippingDate henüz gelmediyse) // Tamamlanmadı.
Tam olarak bu aşamayı gerçekleştiremedik. 
<br>
- Sisteme login olma ve JWT Token alma // Tamamlanmadı
En zorlandığım kısımlardan biri oldu fakat sanıyorum ki Entity oluşumunu tam olarak tamamlayamadığım için get ve set parametlerim ve bu kısımdaki galiba nested kod blogu olarak geçen /** *@ORM\ */ kısımlarda hata yada bilgisizliğimden kaynaklı anlaşılmazlıklar olduğu için kurulumu verilen sürede gerçekleştiremedim.

api_platformdan ve easy_adminden bu süreçte destek alarak en azından bir ui ve destek almayı planladım fakat çok başarılı olduğum söylenemez.
seri veri seti oluştumark için doctrine:fixtures kullanmaya çaliştim.
