using System;
using System.Collections.Generic;

namespace COMP2001_Authentication_API.Models
{
    public partial class Users
    {
        public Users()
        {
            Passwords = new HashSet<Passwords>();
            Sessions = new HashSet<Sessions>();
        }

        public int UserId { get; set; }
        public string FirstName { get; set; }
        public string LastName { get; set; }
        public string Email { get; set; }
        public string Password { get; set; }

        public virtual ICollection<Passwords> Passwords { get; set; }
        public virtual ICollection<Sessions> Sessions { get; set; }
    }
}
