using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using System.Text.RegularExpressions;
using Microsoft.EntityFrameworkCore;
using COMP2001_Authentication_API.Models;

namespace COMP2001_Authentication_API.Controllers
{
    [Route("api/v1/user")]
    [ApiController]
    public class UsersController : ControllerBase
    {
        private readonly COMP2001_LTrowbridgeContext _context;

        public UsersController(COMP2001_LTrowbridgeContext context)
        {
            _context = context;
        }

        // GET: api/Users
        [HttpGet]
        public async Task<IActionResult> Get([FromBody] Users user)
        {
            if (APIKeyIsValid(HttpContext.Request.Headers))
            {
                bool validated = GetValidation(user);
                Dictionary<string, bool> validatedDict = new Dictionary<string, bool>();
                validatedDict.Add("verified", validated);
                return new JsonResult(validatedDict);
            }
            else
            {
                return StatusCode(401);
            }
        }

        // PUT: api/Users/5
        // To protect from overposting attacks, enable the specific properties you want to bind to, for
        // more details, see https://go.microsoft.com/fwlink/?linkid=2123754.
        [HttpPut("{id}")]
        public async Task<IActionResult> Put(int id, Users users)
        {
            if (APIKeyIsValid(HttpContext.Request.Headers))
            {
                SendUpdate(id, users);
                return NoContent();
            }
            else
            {
                return StatusCode(401);
            }
        }

        // POST: api/Users
        // To protect from overposting attacks, enable the specific properties you want to bind to, for
        // more details, see https://go.microsoft.com/fwlink/?linkid=2123754.
        [HttpPost]
        public async Task<IActionResult> Post(Users users)
        {
            if (APIKeyIsValid(HttpContext.Request.Headers))
            {
                Register(users, out string responseMessage);
                string code = responseMessage.Substring(0, 3);
                switch (code)
                {
                    case "200":
                        Dictionary<string, int> responseDictionary = new Dictionary<string, int>();
                        responseDictionary.Add("UserID", Convert.ToInt32(responseMessage.Substring(3)));
                        return new JsonResult(responseDictionary);

                    case "208":
                        return StatusCode(208);

                    default:
                        return NotFound();
                }
            }
            else
            {
                return StatusCode(401);
            }
        }

        // DELETE: api/Users/5
        [HttpDelete("{id}")]
        public async Task<ActionResult<Users>> Delete(int id)
        {
            if (APIKeyIsValid(HttpContext.Request.Headers))
            {
                _context.Delete(id);
                return NoContent();
            }
            else
            {
                return StatusCode(401);
            }
        }

        private void Register(Users user, out string responseMessage)
        {
            _context.Register(user, out responseMessage);
        }

        private bool GetValidation(Users user)
        {
            bool validated = _context.Validate(user);
            return validated;
        }

        private void SendUpdate(int id, Users user)
        {
            _context.UpdateUser(id, user);
        }

        private bool APIKeyIsValid(IHeaderDictionary headers)
        {
            string apiKeyTitle = "api_key";
            if (headers.ContainsKey(apiKeyTitle))
            {
                // Escape string here by using it as a string literal
                string apiKey = @headers[apiKeyTitle];
                return _context.LookupAPIKey(apiKey);
            }
            else
            {
                return false;
            }
        }

        private bool UsersExists(int id)
        {
            return _context.Users.Any(e => e.UserId == id);
        }
    }
}
