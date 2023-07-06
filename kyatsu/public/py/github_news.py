from bs4 import BeautifulSoup
import requests as r

page = r.get('https://github.com/Edwardvee/kyatsumobagame/commits/main').content
final_output = ""
soup = BeautifulSoup(page, 'lxml')
commits = soup.find_all('li', class_ = "Box-row Box-row--focus-gray mt-0 d-flex js-commits-list-item js-navigation-item")
for commit in commits:
     name = commit.find('a', class_ = "Link--primary text-bold js-navigation-open markdown-title").text
     description = ""
     if commit.find('div', class_ = "my-2 Details-content--hidden"):
              description = commit.find('pre', class_ = "text-small ws-pre-wrap").text
     final_output += "<div class='row'><div class='col'><p>"+ name +"</p><p>"+ description +"</p></div></div>"
print(final_output)


def main():
    output = final_output

    with open('output.txt', 'w') as f:
        f.write(output)

if __name__ == '__main__':
    main()