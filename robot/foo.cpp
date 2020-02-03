#include <iostream> 
using namespace std; 
  
int main(int argc,char* argv[]) 
{ 
	printf("Program Name Is: %s",argv[0]); 
	
    cout << "You have entered " << argc 
         << " arguments:" << "\n"; 
  
    for (int i = 0; i < argc; ++i) 
        cout << argv[i] << "\n"; 
  
    return 0; 
} 