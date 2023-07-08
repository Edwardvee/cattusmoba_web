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
     final_output += "<div class='row dev-item-row'><div class='col info-col'><p class='name'>--"+ name +"</p><p class='description'>"+ description +"</p></div></div>"
print(final_output)

page2 = r.get("https://github.com/Edwardvee/kyatsumobagame/releases").content
final_output2 = ""
soup2 = BeautifulSoup(page2, 'lxml')
releases = soup2.find_all('div', class_ = "col-md-9")
for release in releases:
     name = release.find('a', class_ = "Link--primary").text
     description = release.find('p', class_ = "").text
     final_output2 += "<div class='row dev-item-row'><div class='col info-col'><p class='name'>--"+ name +"</p><p class='description'>"+ description +"</p></div></div>"


def main():
    output = final_output

    with open('output.txt', 'w') as f:
        f.write(output)

    output2 = final_output2  
    with open('output2.txt', 'w') as f:
        f.write(output2)


if __name__ == '__main__':
    main()