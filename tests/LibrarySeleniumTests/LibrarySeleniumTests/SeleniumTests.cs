using OpenQA.Selenium;
using OpenQA.Selenium.Chrome;

namespace LibrarySeleniumTests
{
    [TestClass]
    public class SeleniumTests
    {
        WebDriver driver;
        [TestInitialize]
        public void Init()
        {
            driver = new ChromeDriver();
            driver.Navigate().GoToUrl("http://frontend.vm1.test/");
        }

        [TestMethod]
        public void TenCardsInitially()
        {
            List<IWebElement> cards = driver.FindElements(By.ClassName("book-card")).ToList();
            Assert.AreEqual(10, cards.Count);
        }

        [TestMethod]
        public void CardDetailsButtonRedirects()
        {
            Assert.AreEqual("http://frontend.vm1.test/",driver.Url);
            List<IWebElement> cards = driver.FindElements(By.ClassName("book-card")).ToList();
            cards[0].FindElement(By.TagName("a")).Click();
            Assert.AreEqual("http://frontend.vm1.test/books/1",driver.Url);
        }

        [TestMethod]
        public void DeleteRedirectsWithLessCards()
        {
            List<IWebElement> cards = driver.FindElements(By.ClassName("book-card")).ToList();
            cards[0].FindElement(By.TagName("a")).Click();
            driver.FindElement(By.Id("delete-button")).Click();
            Assert.AreEqual("http://frontend.vm1.test/", driver.Url);
            cards = driver.FindElements(By.ClassName("book-card")).ToList();
            Assert.AreEqual(9, cards.Count);
        }

        [TestMethod]
        public void ModifyingTitleChangesItForCards()
        {
            List<IWebElement> cards = driver.FindElements(By.ClassName("book-card")).ToList();
            cards[0].FindElement(By.TagName("a")).Click();
            driver.FindElement(By.Name("title")).SendKeys("Another title");
            driver.FindElement(By.Id("edit-button")).Click();
            Assert.AreEqual("http://frontend.vm1.test/", driver.Url);
            cards = driver.FindElements(By.ClassName("book-card")).ToList();
            Assert.AreEqual("Another title", cards[0].FindElement(By.TagName("h5")).Text);
        }

        [TestMethod]
        public void SetLanguageToEmptyShowsError()
        {
            List<IWebElement> cards = driver.FindElements(By.ClassName("book-card")).ToList();
            cards[0].FindElement(By.TagName("a")).Click();
            driver.FindElement(By.Name("language")).SendKeys(Keys.Backspace);
            driver.FindElement(By.Id("edit-button")).Click();
            Assert.AreEqual("http://frontend.vm1.test/books/1", driver.Url);
            Assert.IsTrue(driver.FindElements(By.ClassName("formkit-message")).Select(x => x.Text).Contains("Language is required."));
        }

        [TestMethod]
        public void SetTooLongLanguageShowsError()
        {
            List<IWebElement> cards = driver.FindElements(By.ClassName("book-card")).ToList();
            cards[0].FindElement(By.TagName("a")).Click();
            driver.FindElement(By.Name("language")).SendKeys("asdasdasdassdasdasdssadassdasdasdasdsadsadsadasdsdaasdasdasdsadsadasdasdas");
            driver.FindElement(By.Id("edit-button")).Click();
            Assert.AreEqual("http://frontend.vm1.test/books/1", driver.Url);
            Assert.IsTrue(driver.FindElements(By.ClassName("formkit-message")).Select(x => x.Text).Contains("Language must be between 4 and 30 characters."));
        }

        [TestMethod]
        public void SetTooShortLanguageShowsError()
        {
            List<IWebElement> cards = driver.FindElements(By.ClassName("book-card")).ToList();
            cards[0].FindElement(By.TagName("a")).Click();
            driver.FindElement(By.Name("language")).SendKeys("asd");
            driver.FindElement(By.Id("edit-button")).Click();
            Assert.AreEqual("http://frontend.vm1.test/books/1", driver.Url);
            Assert.IsTrue(driver.FindElements(By.ClassName("formkit-message")).Select(x => x.Text).Contains("Language must be between 4 and 30 characters."));
        }

        [TestMethod]
        public void SetTooShortTitleShowsError()
        {
            List<IWebElement> cards = driver.FindElements(By.ClassName("book-card")).ToList();
            cards[0].FindElement(By.TagName("a")).Click();
            driver.FindElement(By.Name("title")).SendKeys("a");
            driver.FindElement(By.Id("edit-button")).Click();
            Assert.AreEqual("http://frontend.vm1.test/books/1", driver.Url);
            Assert.IsTrue(driver.FindElements(By.ClassName("formkit-message")).Select(x => x.Text).Contains("Title must be between 2 and 80 characters."));
        }

        [TestMethod]
        public void SetTooLongTitleShowsError()
        {
            List<IWebElement> cards = driver.FindElements(By.ClassName("book-card")).ToList();
            cards[0].FindElement(By.TagName("a")).Click();
            driver.FindElement(By.Name("title")).SendKeys("asdasdasdassdasdasdssadassdasdasdasdsadsadsadasdsdaasdasdasdsadsadasdasdasasdasdasdassdasdasdssadassdasdasdasdsadsadsadasdsdaasdasdasdsadsadasdasdas");
            driver.FindElement(By.Id("edit-button")).Click();
            Assert.AreEqual("http://frontend.vm1.test/books/1", driver.Url);
            Assert.IsTrue(driver.FindElements(By.ClassName("formkit-message")).Select(x => x.Text).Contains("Title must be between 2 and 80 characters."));
        }

        [TestMethod]
        public void SetFutureDateShowsError()
        {
            List<IWebElement> cards = driver.FindElements(By.ClassName("book-card")).ToList();
            cards[0].FindElement(By.TagName("a")).Click();
            driver.FindElement(By.Name("published_date")).SendKeys("01/01/2032");
            driver.FindElement(By.Id("edit-button")).Click();
            Assert.AreEqual("http://frontend.vm1.test/books/1", driver.Url);
            Assert.IsTrue(driver.FindElements(By.ClassName("formkit-message")).Select(x => x.Text).Contains("Published date must be today or earlier."));
        }

        [TestMethod]
        public void SetPagesToZeroShowsError()
        {
            List<IWebElement> cards = driver.FindElements(By.ClassName("book-card")).ToList();
            cards[0].FindElement(By.TagName("a")).Click();
            driver.FindElement(By.Name("pages")).SendKeys("0");
            driver.FindElement(By.Id("edit-button")).Click();
            Assert.AreEqual("http://frontend.vm1.test/books/1", driver.Url);
            Assert.IsTrue(driver.FindElements(By.ClassName("formkit-message")).Select(x => x.Text).Contains("Pages must be at least 1."));
        }

        [TestMethod]
        public void ClickOnCreateBookNavbarRedirects()
        {
            Assert.AreEqual("http://frontend.vm1.test/", driver.Url);
            driver.FindElement(By.Id("create-book")).Click();
            Assert.AreEqual("http://frontend.vm1.test/books/create", driver.Url);
        }

        [TestMethod]
        public void LeavingISBNEmptyShowsError()
        {
            driver.FindElement(By.Id("create-book")).Click();
            driver.FindElement(By.Name("isbn")).SendKeys(Keys.Backspace);
            driver.FindElement(By.Id("create-button")).Click();
            Assert.IsTrue(driver.FindElements(By.ClassName("formkit-message")).Select(x => x.Text).Contains("ISBN is required."));          
        }

        [TestMethod]
        public void LeavingLanguageEmptyShowsError()
        {
            driver.FindElement(By.Id("create-book")).Click();
            driver.FindElement(By.Name("language")).SendKeys(Keys.Backspace);
            driver.FindElement(By.Id("create-button")).Click();
            Assert.IsTrue(driver.FindElements(By.ClassName("formkit-message")).Select(x => x.Text).Contains("Language is required."));          
        }

        [TestMethod]
        public void LeavingPagesEmptyShowsError()
        {
            driver.FindElement(By.Id("create-book")).Click();
            driver.FindElement(By.Name("pages")).SendKeys(Keys.Backspace);
            driver.FindElement(By.Id("create-button")).Click();
            Assert.IsTrue(driver.FindElements(By.ClassName("formkit-message")).Select(x => x.Text).Contains("Pages is required."));          
        }

        [TestMethod]
        public void ISBNNot13CharLongShowsError()
        {
            driver.FindElement(By.Id("create-book")).Click();
            driver.FindElement(By.Name("pages")).SendKeys("asd");
            driver.FindElement(By.Id("create-button")).Click();
            Assert.IsTrue(driver.FindElements(By.ClassName("formkit-message")).Select(x => x.Text).Contains("ISBN should be 13 characters long."));

            driver.FindElement(By.Name("pages")).SendKeys("asdasdasdsadsadasdasd");
            driver.FindElement(By.Id("create-button")).Click();
            Assert.IsTrue(driver.FindElements(By.ClassName("formkit-message")).Select(x => x.Text).Contains("ISBN should be 13 characters long."));
        }

        [TestMethod]
        public void CreateWithTooLongTitleShowsError()
        {
            driver.FindElement(By.Id("create-book")).Click();
            driver.FindElement(By.Name("title")).SendKeys("asdasdasdassdasdasdssadassdasdasdasdsadsadsadasdsdaasdasdasdsadsadasdasdasasdasdasdassdasdasdssadassdasdasdasdsadsadsadasdsdaasdasdasdsadsadasdasdas");
            driver.FindElement(By.Id("create-button")).Click();
            Assert.IsTrue(driver.FindElements(By.ClassName("formkit-message")).Select(x => x.Text).Contains("Title must be between 2 and 80 characters."));
        }

        [TestMethod]
        public void CreateWithTooShortTitleShowsError()
        {
            driver.FindElement(By.Id("create-book")).Click();
            driver.FindElement(By.Name("title")).SendKeys("s");
            driver.FindElement(By.Id("create-button")).Click();
            Assert.IsTrue(driver.FindElements(By.ClassName("formkit-message")).Select(x => x.Text).Contains("Title must be between 2 and 80 characters."));
        }

        [TestMethod]
        public void CreateWithTooLongLanguageShowsError()
        {
            driver.FindElement(By.Id("create-book")).Click();
            driver.FindElement(By.Name("language")).SendKeys("asdasdasdassdasdasdssadassdasdasdasdsadsadsadasdsdaasdasdasdsadsadasdasdas");
            driver.FindElement(By.Id("create-button")).Click();
            Assert.IsTrue(driver.FindElements(By.ClassName("formkit-message")).Select(x => x.Text).Contains("Language must be between 4 and 30 characters."));
        }

        [TestMethod]
        public void CreateWithTooShortLanguageShowsError()
        {
            driver.FindElement(By.Id("create-book")).Click();
            driver.FindElement(By.Name("language")).SendKeys("asd");
            driver.FindElement(By.Id("create-button")).Click();
            Assert.IsTrue(driver.FindElements(By.ClassName("formkit-message")).Select(x => x.Text).Contains("Language must be between 4 and 30 characters."));
        }

        [TestMethod]
        public void CreateWithNegativePagesShowsError()
        {
            driver.FindElement(By.Id("create-book")).Click();
            driver.FindElement(By.Name("pages")).SendKeys("-1");
            driver.FindElement(By.Id("create-button")).Click();
            Assert.IsTrue(driver.FindElements(By.ClassName("formkit-message")).Select(x=>x.Text).Contains("Pages must be at least 1."));
        }
    }
}